<?php

namespace Modules\Admin\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Transformers
use Modules\Admin\Transformers\TheaterTransformer;

// Models
use App\Models\Agency;
use App\Models\Theater;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Location;



class TheaterController extends Controller
{


    public function createTheater(TheaterTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'agency_id' => 'required',
            'email'=>'required|email|unique:theaters'
        ]);

        $agency_id = $request->input('agency_id');
        $name = $request->input('name');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $phone = $request->input('phone');
        $postal = $request->input('postal');
        $email = $request->input('email');
        $sub_domain = $request->input('sub_domain');
        $password = $request->input('password');
        $gtm_body = $request->input('gtm_body');
        $gtm_header = $request->input('gtm_header');
        $timezone = $request->input('timezone');


        $theater = Theater::create([
                    'agency_id'  => $agency_id,
                    'name'       => $name,
                    'address'    => $address,
                    'city'       => $city,
                    'state'      => $state,
                    'phone'      => $phone,
                    'email'      => $email,
                    'sub_domain' => $sub_domain,
                    'country'    => $country,
                    'postal'     => $postal,
                    'status'     => 'inactive',
                    'gtm_header' => $gtm_header,
                    'gtm_body'   => $gtm_body,
                    'timezone'   => $timezone
        ]);
        $this->initDefoultValuesToDbForTheater($agency_id,$theater['_id']);
        // Get Theather Admin Role
        $role = Role::where(['agency_id' => $agency_id, 'name' => 'theater_admin'])->first();

        //create User For Theater
        $user = User::create([
            'email'=>$email,
            'password'=>bcrypt($password),
            'agency_id'=>$agency_id,
            'theater_id'=>$theater['_id'],
            'role_id'=>$role['_id'],
            'account_type'=>'theater_admin',
            'type'=>'theater'
        ]);

        $location = Location::create([
            'user_id' => $user['_id'],
            'agency_id' => $agency_id,
            'theater_id'=>$theater['_id'],
            'name' => 'Location',
            'address'=>$address,
            'description'=>'Default Location for Theater'
        ]);

        return $this->item($theater, $transformer);

    }

    public function getSingleTheater(TheaterTransformer $transformer, Request $request, $theaterId)
    {

        $theater = Theater::find($theaterId);
        return $this->item($theater, $transformer);
    }

    public function editTheater(TheaterTransformer $transformer, Request $request, $id)
    {
        $name = $request->input('name');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $phone = $request->input('phone');
        $postal = $request->input('postal');
        $email = $request->input('email');
        $sub_domain = $request->input('sub_domain');
        $gtm_body = $request->input('gtm_body');
        $gtm_header = $request->input('gtm_header');
        $timezone = $request->input('timezone');
        $theater = Theater::find($id);

        if ($name) {
            $theater->name = $name;
        }
        if ($address) {
            $theater->address = $address;
        }
        if ($city) {
            $theater->city = $city;
        }
        if ($state) {
            $theater->state = $state;
        }
        if ($country) {
            $theater->country = $country;
        }
        if ($phone) {
            $theater->phone = $phone;
        }
        if ($postal) {
            $theater->postal = $postal;
        }
        if ($email) {
            $theater->email = $email;
        }
        if ($sub_domain) {
            $theater->sub_domain = $sub_domain;
        }
        if ($gtm_body) {
            $theater->gtm_body = $gtm_body;
        }
        if ($gtm_header) {
            $theater->gtm_header = $gtm_header;
        }
        if ($timezone) {
            $theater->timezone = $timezone;
        }


        if (count($request->all()) > 1) {

            $save = $theater->save();

        }

        return $this->item($theater, $transformer);

    }
    /**
     * Get Agency Theater
     *
     * @return \Illuminate\Http\Response
     */
    public function getAgencyTheaters(TheaterTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'agency_id' => 'required'
        ]);
        $agency_id = $request->input('agency_id');
        $per_page = (int)$request->input('per_page', 5);

        $theaters = Theater::where('agency_id', $agency_id)->paginate($per_page);

        return $this->response->paginator($theaters, $transformer);
    }

     /**
     * Get All Theaters
     *
     * @return \Illuminate\Http\Response
     */
    public function getTheaters(TheaterTransformer $transformer, Request $request)
    {
                
        $per_page = (int)$request->input('per_page', 100);

        $theaters = Theater::paginate($per_page);

        return $this->response->paginator($theaters, $transformer);
    }

    /**
     * Activate a Agency
     *
     * @return \Illuminate\Http\Response
     */
    public function activateTheater(TheaterTransformer $transformer, $id)
    {
        $agency = Theater::find($id);
        $agency->status = 'active';
        $agency->save();

        return $this->item($agency, $transformer);


    }

    /**
     * Deactivate a Agency
     *
     * @return \Illuminate\Http\Response
     */
    public function deactivateTheater(TheaterTransformer $transformer, $id)
    {
        $agency = Theater::find($id);
        $agency->status = 'inactive';
        $agency->save();

        return $this->item($agency, $transformer);

    }

    /**
     * Delete a Agency
     *
     * @return Status
     */
    public function deleteTheater(TheaterTransformer $transformer, $id)
    {
        $theater = Theater::find($id)->delete();

        return ['status' => 'success', 'message' => 'Theater Deleted'];
    }

    // Function working when we create Theater
    private function initDefoultValuesToDbForTheater($agencyId,$theaterId){
        $roles=[
            [	'name' => 'theater_admin',
                'display_name' => 'Theater Admin',
                'description' => 'Theater Admin',
                'agency_id' => $agencyId,
                'theater_id'=>$theaterId,
                'type'=>'theater'
            ],
            [	'name' => 'theater_user',
                'display_name' => 'theater User',
                'description' => 'Theater User',
                'agency_id' => $agencyId,
                'theater_id' => $theaterId,
                'type'=>'theater'
            ],
            [
                'name' => 'theater__scanner_user',
                'display_name' => 'Theater Scanner User',
                'description' => 'Theater Scanner User',
                'agency_id' => $agencyId,
                'theater_id' => $theaterId,
                'type'=>'theater'
            ]
        ];

        DB::table('roles')->insert($roles);
        $role = Role::where(['agency_id' => $agencyId,'theater_id'=>$theaterId, 'name' => 'theater_admin'])->first();
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            if($permission['type']!='super_admin' || $permission['type']=='theater_admin' || $permission['type']=='' ){
                $permission->roles()->attach($role['id']);
            }

        }

    }



}