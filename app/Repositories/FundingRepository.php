<?php

namespace App\Repositories;

use Hash;
use Auth;
use File;
use App\Funding;

class FundingRepository extends BaseRepository
{
    public function create($data)
    {
        return Funding::create([
            'id'               =>    $this->generateUuid(),
            'user_id'          =>   Auth::user()->id,
        ]);
    }

    public function update($Funding_id, $data)
    {
        // $update['name'] = $data['name'];
        // $update['description'] = $data['description'];
        // $update['price'] = $data['price'];
        return Funding::where('id', $Funding_id)->update($data);
    }

    public function list()
    {
        $Fundings = Funding::where('user_id', Auth::user()->id)->get();
        return $Fundings;
    }

    public function getAllFundings()
    {
        return Funding::all();
    }

    public function findFunding($funding_id)
    {
        return Funding::where('id', '=', $funding_id)->first();
    }

    public function updateFunding($Funding_id, $data)
    {
        $product = Funding::where('id', $Funding_id)->update($data);
    }

    public function delete($Funding_id)
    {
        $Funding = Funding::where('id', $Funding_id)->first();

        $done = Funding::where('id', $Funding_id)->delete();

        $this->deletePicture($Funding);

        return true;
    }

    public  function deletePicture($Funding)
    {
        $picturePath = public_path() . '/img/Fundings/' . $Funding['picture'];
        File::delete($picturePath);
        return true;
    }


    public function savePicture($data)
    {
        $exploded = explode(',', $data['picture']);
        $decoded = base64_decode($exploded[1]);

        if(str_contains($exploded[0], 'jpeg'))
            $extension = 'jpg';
        else
            $extension = 'png';
        $filename = 'product-' . time() . "." . $extension;
        $destinationPath = public_path() . '/img/Fundings/' . $filename;

        file_put_contents($destinationPath, $decoded);

        return $filename;
    }

    public function getFunding($Funding_id)
    {
        return Funding::where('id', $Funding_id)->get();
    }
}
