<?php

namespace Modules\Theater\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Modules\Theater\Transformers\LocationTransformer;

class LocationController extends Controller
{
    public function createLocation(LocationTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'user_id'    => 'required',
            'theater_id' => 'required'
        ]);

        $user_id        = $request->input('user_id');
        $agency_id      = $request->input('agency_id');
        $theater_id     = $request->input('theater_id');
        $name           = $request->input('name', 'Location');
        $description    = $request->input('description');
        $address        = $request->input('address');
        $city           = $request->input('city');
        $email          = $request->input('email');
        $phone          = $request->input('phone');

        if ($request->image != '') {
            $exploded = explode(',', $request->image);
            $decoded = base64_decode($exploded[1]);

            if(str_contains($exploded[0], 'jpeg'))
                $extension = 'jpg';
            else
                $extension = 'png';
            $filename = 'location-' . time() . "." . $extension;
            $destinationPath = public_path() . '/img/locations/' . $filename;

            file_put_contents($destinationPath, $decoded);

            $location = Location::create([
                'user_id'       => $user_id,
                'agency_id'     => $agency_id,
                'address'       => $address,
                'theater_id'    => $theater_id,
                'name'          => $name,
                'description'   => $description,
                'address'       => $address,
                'city'          => $city,
                'email'         => $email,
                'phone'         => $phone,
                'image'         => $filename
            ]);

        }else{

            $location = Location::create([
                'user_id'       => $user_id,
                'agency_id'     => $agency_id,
                'address'       => $address,
                'theater_id'    => $theater_id,
                'name'          => $name,
                'description'   => $description,
                'address'       => $address,
                'city'          => $city,
                'email'         => $email,
                'phone'         => $phone
            ]);

        }

        return $this->item($location, $transformer);
    }

    public function getSingleLocation(LocationTransformer $transformer, $id)
    {
        $location = Location::find($id);
        return $this->item($location, $transformer);
    }

    public function editLocation(Request $request, LocationTransformer $transformer, $id){
        $location       = Location::find($id);
        $name           = $request->input('name', '' );
        $description    = $request->input('description', '');
        $address        = $request->input('address', '');
        $city           = $request->input('city', '');
        $email          = $request->input('email', '');
        $phone          = $request->input('phone', '');
        $image          = $request->input('image', '');

        if($name){
            $location->name = $name;
        }
        if($description){
            $location->description = $description;
        }
        if($address){
            $location->address = $address;
        }
        if($city){
            $location->city = $city;
        }
        if($email){
            $location->email = $email;
        }
        if($phone){
            $location->phone = $phone;
        }

        if($image) {
            $exploded = explode(',', $image);
            $decoded = base64_decode($exploded[1]);

            if(str_contains($exploded[0], 'jpeg'))
                $extension = 'jpg';
            else
                $extension = 'png';
                $filename = 'location-' . time() . "." . $extension;
                $destinationPath = public_path() . '/img/locations/' . $filename;

            file_put_contents($destinationPath, $decoded);
            \File::delete(public_path() . '/img/locations/' . $location['image']);

                $location->update([
                    'address'       => $address,
                    'name'          => $name,
                    'description'   => $description,
                    'address'       => $address,
                    'city'          => $city,
                    'email'         => $email,
                    'phone'         => $phone,
                    'image'         => $filename
                ]);
        }else{
            $location->save();
            return $this->item($location,$transformer);
        }

        return $this->item($location,$transformer);
    }

    public function getAgencyLocations(LocationTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'agency_id' => 'required',
        ]);
        $agency_id = $request->input('agency_id');
        $per_page = (int)$request->input('per_page', 5);

        $locations = Location::where('agency_id', $agency_id)->paginate($per_page);

        return $this->response->paginator($locations, $transformer);
    }

    public function getTheaterLocations(LocationTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'theater_id' => 'required',
        ]);

        $theater_id = $request->input('theater_id');
        $per_page = (int)$request->input('per_page', 5);

        $locations = Location::where('theater_id', $theater_id)->paginate($per_page);
        return $this->response->paginator($locations, $transformer);
    }

    public function removeLocation(Request $request, $id)
    {

        $location_id = $request->input('location_id');
        $location = Location::find($location_id);
        if ($location) {
            // ToDo: Add delete function for Hall .Events
            // Delete Location
            $location->delete();
        }

        return response()->json(['role_name' => $location->name, 'message' => 'Location deleted'], 200);


    }
}