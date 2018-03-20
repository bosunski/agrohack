<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\ContactRepository;
use App\Repositories\MessageRepository;
use Auth;
use Alert;

class UserController extends Controller
{
    public function __construct(UserRepository $user, ContactRepository $contact, MessageRepository $message)
    {
        $this->user    = $user;
        $this->message = $message;
        $this->contact = $contact;
        $this->user_id = Auth::check() ?: Auth::user();
    }

    public function getProfile()
    {
        $user_id = Auth::user()->id;
        $user = $this->user->getUser($user_id);
        return $user;
    }

    public function acceptContact($contact_id)
    {
        // The repo must check if its already accepted, if yes, return 404
        $done = $this->contact->acceptContact($contact_id);
        return $user;
    }

    public function updateProfile(Request $request)
    {
        $done = $this->user->update($request->all());
        if($done) {
            // Alert
        }
    }

    public function getContacts()
    {
        $user_id = Auth::user()->id;
        $contacts = $this->contact->getContacts($user_id);
        return $contacts;
    }

    public function addContact(Request $request)
    {
        $data = (object)$request->all();
        $contact = $this->contact->create($this->user_id, $data);
        if($contact->done) {
            Alert::success('Contact Created!', 'Your Contact has been created Successfully.')->persistent('Close');
            return redirect()->back();
        } else {
            Alert::error('Unable to Create Contact', $contact->message)->autoclose(3000);
            return redirect()->back();
        }
    }

    public function removeContact($contact_id)
    {
        $done = $this->contact->removeContact($this->user_id, $contact_id);
        if ($done) {
            // Alert
        }
    }


    public function getMessages()
    {
        $messages = $this->message->getMessages($this->user_id);
        return $messages;
    }

    public function getConversation($contact_id)
    {
        $conversation = $this->message->getConversation($contact_id);
        return $conversation;
    }
}
