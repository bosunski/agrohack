<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:43 PM
 */

namespace Modules\Admin\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//Tranformers
use Modules\Admin\Transformers\AgencyTransformer;
use App\Transformer\UserTransformer;
use App\Transformer\OrderTransformer;
//Models
use App\Models\Permission;
use App\Models\Agency;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;


class AgencyController extends Controller
{
    /*
     * Get all agency
     * only for Super Admin
     *
     */


    public function getAgencies(AgencyTransformer $transformer, Request $request)
    {
        $name = $request->input('name');
        $per_page = (int)$request->input('per_page', 3);
        $status = $request->input('status');
        $agencies = Agency::status($status)->name($name)->paginate($per_page);

        return $this->response->paginator($agencies, $transformer);
    }

    /*
     * Create Agency
     * Super Admin and when createing Admin
     */
    public function createAgency(AgencyTransformer $transformer, Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
            'name'=>'required',
        ]);

        $name = $request->input('name');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $phone = $request->input('phone');
        $postal = $request->input('postal');
        $email = $request->input('email');
        $password = $request->input('password');


        $agency = Agency::create([
          'name' => $name,
          'address' => $address,
          'city' => $city,
          'state' => $state,
          'phone' => $phone,
          'email' => $email,
          'country' => $country,
          'postal' => $postal,
          'status' => 'inactive'
        ]);
        if ($agency) {
            $this->initDefoultValuesToDbForAgency($agency->id);
        }
        $role = Role::where(['agency_id' => $agency['_id'], 'name' => 'agency_admin'])->first();

        $user = User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>bcrypt($password),
            'agency_id'=>$agency['_id'],
            'role_id'=>$role['_id'],
            'account_type'=>'agency_admin',
            'type'=>'agency'
        ]);


        return $this->item($agency, $transformer);
    }

    /*
     * get Agency data
     * Admin and Super Admin
     */
    public function getAgency(AgencyTransformer $transformer, $id)
    {

        $agency = Agency::find($id);
        return $this->item($agency, $transformer);
    }

    public function editAgency(AgencyTransformer $transformer, Request $request, $id)
    {


        $name = $request->input('name');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $phone = $request->input('phone');
        $postal = $request->input('postal');
        $email = $request->input('email');

        $agency = Agency::find($id);


        if ($name) {
            $agency->name = $name;
        }
        if ($address) {
            $agency->address = $address;
        }
        if ($city) {
            $agency->city = $city;
        }
        if ($state) {
            $agency->state = $state;
        }
        if ($country) {
            $agency->country = $country;
        }
        if ($phone) {
            $agency->phone = $phone;
        }
        if ($postal) {
            $agency->postal = $postal;
        }
        if ($email) {
            $agency->email = $email;
        }


        if (count($request->all()) > 1) {

            $save = $agency->save();

        }


        return $this->item($agency, $transformer);

    }


    /**
     * Activate a Agency
     *
     * @return \Illuminate\Http\Response
     */
    public function activateAgency(AgencyTransformer $transformer, $id)
    {
        $agency = Agency::find($id);
        $agency->status = 'active';
        $agency->save();

        return $this->item($agency, $transformer);


    }

    /**
     * Deactivate a Agency
     *
     * @return \Illuminate\Http\Response
     */
    public function deactivateAgency(AgencyTransformer $transformer, $id)
    {
        $agency = Agency::find($id);
        $agency->status = 'inactive';
        $agency->save();

        return $this->item($agency, $transformer);

    }

    /**
     * Delete a Agency
     *
     * @return Status
     */
    public function deleteAgency(AgencyTransformer $transformer, $id)
    {
        $agency = Agency::find($id)->delete();

        return ['status' => 'success', 'message' => 'Agency Deleted'];
    }


    private function initDefoultValuesToDbForAgency($agencyId)
    {
        $roles = [
            [
                'name' => 'agency_admin',
                'display_name' => 'Agency Admin',
                'description' => 'Agency Admin',
                'agency_id' => $agencyId,
                'type'=>'agency'
            ],
            [
                'name' => 'agency_user',
                'display_name' => 'Agency User',
                'description' => 'Agency User',
                'agency_id' => $agencyId,
                'type'=>'agency'
            ],
//
        ];

        DB::table('roles')->insert($roles);

        $role = Role::where(['agency_id' => $agencyId, 'name' => 'agency_admin'])->first();
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $permission->roles()->attach($role['id']);
        }


    }


}