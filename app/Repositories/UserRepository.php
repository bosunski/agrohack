<?php

namespace App\Repositories;

use Hash;
use Auth;
use File;
use App\User;

class UserRepository extends BaseRepository
{
    public function create($data)
    {
        if ($data->picture != '') {
            $data->picture = $this->savePicture($data);
        }

        //dd($data->gender);
        return User::create([
            'id'            =>    $this->generateUuid(),
            'name'          =>    $data->name,
            'email'         =>    $data->email,
            'location'      =>    $data->location,
            'state'         =>    $data->state,
            'phone'         =>    $data->phone,
            'gender'        =>    $data->gender,
            'user_type'     => $data->user_type ? $data->user_type : null,
            'business_category'        =>    $data->business_category ? $data->business_category : null,
            'farmproducts'  =>    isset($data->farmproducts) ? $data->farmproducts : null,
            'password'      =>    Hash::make($data->password),
            'picture'       =>    $data->picture == '' || $data->picture == null ? null : $data->picture,
        ]);
    }

    public function update($user_id, $data)
    {
        if ($data['picture'] != '') {

            $user = User::where('id', $user_id)->first();
            $this->deletePicture($user);
            $data['picture'] = $this->savePicture($data);
        }

        if($data['picture'] != '' && $data['picture'] != null) $update['picture'] = $data['picture'];

        $update['name'] = $data['name'];
        $update['description'] = $data['description'];
        $update['price'] = $data['price'];

        return User::where('id', $user_id)->update($data);
    }

    public function list($category_id = null, $perpage = 10)
    {
        if($category_id) $users = User::where('category_id', $category_id)->paginate($perpage);
        else $users = User::where('id', '!=', null)->paginate($perpage);
        return $users;
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function findUser($email)
    {
        return User::where('email', '=', $email)->first();
    }

    public function updateUser($user_id, $data)
    {
        $product = User::where('id', $user_id)->update($data);
    }

    public function delete($user_id)
    {
        $user = User::where('id', $user_id)->first();

        $done = User::where('id', $user_id)->delete();

        $this->deletePicture($user);

        return true;
    }

    public  function deletePicture($user)
    {
        $picturePath = public_path() . '/img/users/' . $user['picture'];
        File::delete($picturePath);
        return true;
    }


    public function savePicture($data)
    {
        //dd($data->picture);
        $exploded = explode('.', $data->picture);
        $decoded = base64_decode($exploded[1]);

        if(str_contains($exploded[0], 'jpeg'))
            $extension = 'jpg';
        else
            $extension = 'png';
        $filename = 'user-' . time() . "." . $extension;
        $destinationPath = public_path() . '/img/users/' . $filename;

        file_put_contents($destinationPath, $decoded);

        return $filename;
    }

    public function getUser($user_id)
    {
        return User::where('id', $user_id)->get();
    }
}
