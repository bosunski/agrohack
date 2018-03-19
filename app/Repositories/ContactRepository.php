<?php

namespace App\Repositories;

use App\Contact;

use File;

class ContactRepository extends BaseRepository
{
    public function create($data)
    {
        return Contact::create([
            'id'  => $this->generateUUID(),
            'user_id' => Auth::user()->id,
            'contact_id' => $data->contact_id,
            'accepted'    => 0,
        ]);
    }

    public function list()
    {
        $Contacts = Contact::where('user_id', Auth::user()->id)->get();
        return $Contacts;
    }



    public function delete($Contact_id)
    {
        $done = Contact::where(
                                ['contact_id', '=', $Contact_id],
                                ['user_id'], '=', Auth::user()->id
                            )->delete();
        return true;
    }

    public function getContact($Contact_id)
    {
        return Contact::where('id', $Contact_id)->with('category')->first();
    }

    public function update($Contact_id, $data)
    {
        return Category::where('id', $Contact_id)->update($update);
    }
}
