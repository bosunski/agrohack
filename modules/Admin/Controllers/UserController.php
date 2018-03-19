<?php

namespace Modules\Admin\Controllers;

use App\Models\DiscountCode;
use App\Models\Event;
use App\Models\Gener;
use App\Models\Order;
use App\Models\Theater;
use App\Models\Type;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;


use Modules\Admin\Transformers\UserTransformer;
use Modules\Admin\Transformers\UserListTransformer;

class UserController extends Controller
{

    private $jwtauth;

    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $jwtauth)
    {
       $this->jwtauth = $jwtauth;
       $this->user = $this->jwtauth->parseToken()->authenticate();
    }


     /**
     * Get a User.
     *
     * @return User Object
     */
    public function getUser($id, UserTransformer $transformer){
         $user = User::find($id);
         // date_default_timezone_set($user->theater->timezone);
         return $this->item($user, $transformer);
    }

    public function createUser(Request $request, UserTransformer $transformer){

        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required',
            'agency_id' => 'required',
        ]);

         $role_id       = $request->input('role_id');
         $name          = $request->input('name');
         $email         = $request->input('email');
         $password      = bcrypt($request->input('password'));
         $agency_id     = $request->input('agency_id');
         $theater_id    = $request->input('theater_id','');

         if($role_id){
            $role = Role::find($role_id);
            if($role->name != "agency_admin"){
                $account_type = $role->name;
            }else{
                $account_type = 'agency_admin';
            }

         }
         $user = User::create([
             'name'         => $name,
             'email'        => $email,
             'agency_id'    => $agency_id,
             'role_id'      => $role_id,
             'password'     => $password,
             'account_type' => $account_type,
             'type'         => $this->user->type
         ]);
          if($theater_id){
            $user->theater_id = $theater_id;
            $user->save();
          }

         return $this->item($user, $transformer);

        }

    public function getUsersByAgency($agency_id, Request $request,UserTransformer $transformer){

         $per_page = $request->input('per_page',10); //pagination

         $users = User::where(['agency_id'=>$agency_id])->paginate($per_page);

         return $this->response->paginator($users,$transformer);

    }

    public function getUsersByTheater($theater_id,Request $request,UserTransformer $transformer){
            $per_page = $request->input('per_page',10); //pagination

             $users = User::where(['theater_id' => $theater_id, 'type' => 'theater'])->paginate($per_page);

             return $this->response->paginator($users,$transformer);
    }

    public function getUsers(Request $request,UserTransformer $transformer){

        $per_page = $request->input('per_page',100); //pagination

        if($request->input('theater_id')){
            $theater_id = $request->input('theater_id');
            $users = User::where(['type' => 'user', 'theater_id' => $theater_id])->paginate($per_page);
        }else if($request->input('agency_id')){
            $agency_id = $request->input('agency_id');
            $users = User::where(['type' => 'user', 'agency_id' => $agency_id])->paginate($per_page);
        }
        else{
            $users = User::where(['type' => 'user'])->paginate($per_page);
        }

        return $this->response->paginator($users, $transformer);

   }

   public function searchUsers(Request $request, UserTransformer $transformer){
    $per_page       = $request->input('per_page',100); //pagination

    $name           = $request->input('name',false);
    $email          = $request->input('email',false);
    $theater_id     = $request->input('theaterID');
    $agency_id      = $request->input('agencyID');
    $account_type   = $request->input('accountType');

   if(isset($theater_id) && isset($agency_id) && $account_type == 'theater_admin'){
       $users = User::where(['type' => 'user', 'theater_id' => $theater_id]);
   }else if(isset($agency_id) && empty($theater_id)  && $account_type == 'agency_admin'){
       $users = User::where(['type' => 'user', 'agency_id' => $agency_id]);
   }else if($account_type == 'super_admin'){
       $users = User::where(['type' => 'user']);
   }

   if($name){
       $users = $users->where('name','LIKE',"%{$name}%");
   }
   if($email) {
       $users=$users->where('email', $email);
   }
   $users = $users->paginate();

   return $this->response->paginator($users, $transformer);

}

   public function getSingleUser($id, Request $request, UserTransformer $transformer){

       $user = User::find($id);

       $user['orders'] = Order::with('event', 'tickets')->where(['user_id' => $id])->get();
       if(!empty($user['orders'])){
           foreach($user['orders'] as $key => $orders){
              if($orders['theater_id']){
                  $user['orders'][$key]['theater'] = Theater::find($orders['theater_id']);
              }
//                Discount Code
//               if($orders['event']['show']['discount_code_ids']){
//                   $user['orders'][$key]['showDiscount'] = DiscountCode::find($orders['event']['show']['discount_code_ids']);
//               }
//              Show Genre
              if($orders['event']['show']['gener_ids']){
                  $user['orders'][$key]['showGenres'] = Gener::find($orders['event']['show']['gener_ids']);
              }
//                Show Type
               if($orders['event']['show']['type_ids']){
                   $user['orders'][$key]['showCategory'] = Type::find($orders['event']['show']['type_ids']);
               }
//                Show Donation
               if($orders['donation_price']){
                 $user['orders'][$key]['showDonation'] = $orders['donation_price'];
               }
//                Show Tickets
               if($orders['tickets_count']){
                   $user['orders'][$key]['showTickets'] = $orders['tickets_count'];
               }
           }
       }

       return $this->item($user, $transformer);
   }

    public function editUser(Request $request,UserTransformer $transformer, $id){
            $user_id = $id;

            $user = User::find($user_id);

            $name       = $request->input('name','');
            $email      = $request->input('email','');
            $password   = $request->input('password','');
            $role_id    = $request->input('role_id');

            if($name){
                $user->name = $name;
            }
            if($email){
                $user->email = $email;
            }
            if($password){
                $user->password = bcrypt($password);
            }
            if($role_id){
               $role = Role::find($role_id);
               if($role->name != "agency_admin"){
                   $account_type = $role->name;
               }else{
                   $account_type = 'agency_admin';
               }

            }

            if (count($request->all()) > 1) {
              $result = $user->save();
            }

            if( $result ){
                return $this->item($user, $transformer);
            }else{
                return ['message'=>"User not updated"];
            }
    }



     /**
     * Delete a User
     *
     * @return User Object
     */
    public function deleteUser($id){

        $user = User::find($id)->delete();
        return ['message'=>'User Deleted'];

    }


}