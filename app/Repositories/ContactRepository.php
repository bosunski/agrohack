<?php

namespace App\Repositories;

use App\Contact;
use App\User;
use Auth;

use File;

class ContactRepository extends BaseRepository
{
    public function create($user_id = null, $data)
    {
        // Check if its my email
        if(!$data->email == Auth::user()->email) return (object) ['done' => false, 'message' => 'You cannot Add yourself as a Contact.'];

        // Get the user being added
        $contact = User::where('email', $data->email)->first();
        if(!$contact) return (object) ['done' => false, 'message' => 'Unable to find the person with the Email.'];

        $mycontacts = $this->list();
        $found = false;
        foreach ($mycontacts as $key => $value) {
            if($value->contact_id == $contact['id']) {
                $found = true;
            }
        }

        if($found) return (object) ['done' => false, 'message' => 'This Person is already in your contact.'];

        $done = Contact::create([
            'id'  => $this->generateUUID(),
            'user_id' => Auth::user()->id,
            'contact_id' => $contact['id'],
            'accepted'    => 0,
        ]);

        if($done) {
            return (object) ['done' => true, 'message' => 'Contact Added.'];
        }
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
