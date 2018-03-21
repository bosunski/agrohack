<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\ContactRepository;
use App\Repositories\MessageRepository;
use App\Notification;
use App\Report;
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

    public function getUser($user_id)
    {
        $user = $this->user->getUser($user_id);
        return $user;
    }

    public function acceptContact($contact_id)
    {
        // The repo must check if its already accepted, if yes, return 404
        $done = $this->contact->acceptContact($contact_id);
        return $user;
    }

    public function updateProfile($id, Request $request)
    {
        $data = $request->all();
        $picture = $request->file('picture');
        if($picture) {
            $imageName = 'product-'.time().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('img/users'), $imageName);

            // $data =  $request->all();
            $data['picture'] = $imageName;
        }

        $done = $this->user->update($id, $data);
        if($done) {
            Alert::success('Profile Updated!', 'Your Profile has been updated')->persistent('Close');
            return redirect()->back();
        }
    }

    public function getContacts()
    {
        $user_id = Auth::user()->id;
        $contacts = $this->contact->list();
        //dd($contacts);
        $data['contacts'] = $contacts;
        return view('dashboard.contacts', $data);
    }

    public function addNote()
    {
        return view('front.notify');
    }

    public function addGeneralNote(Request $request)
    {
        $notification = new Notification;
        $notification->type = 'general';
        $notification->title = $request->title;
        $notification->message = $request->message;
        $notification->save();

        return redirect("/notify")->with('status', 'Notification sent to all Users on Open Farm');
    }


    public function getNotifications()
    {
        $mineg = Notification::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get()->toArray();
        $general = Notification::where('type', 'general')->orderBy('created_at', 'desc')->get()->toArray();
        $notifications = array_merge($general, $mineg);

        $data['notifications'] = $notifications;
        return view('dashboard.notifications', $data);
    }


    public function addContact(Request $request)
    {
        $data = (object)$request->all();
        $contact = $this->contact->create($this->user_id, $data);
        if($contact->done) {
            // We notify the person concerned
            $notification = new Notification;
            $notification->user_id = $contact->data->contact_id;
            $notification->type = 'user';
            $notification->title = 'Contact Update';
            $notification->message = Auth::user()->name . ' has added you at contact. His email is ' . Auth::user()->email;
            $notification->save();

            Alert::success('Contact Created!', 'Your Contact has been created Successfully.')->persistent('Close');
            return redirect('/dashboard/contacts');
        } else {
            Alert::error('Unable to Create Contact', $contact->message)->autoclose(3000);
            return redirect('/dashboard/contacts');
        }
    }

    public function removeContact($contact_id)
    {
        $done = $this->contact->deleteContact($contact_id);
        Alert::success('Contact Deleted!', 'Your Contact has been deleted Successfully.')->persistent('Close');
        return redirect()->back();
    }

    public function report()
    {
        $contacts = $this->contact->list();
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->data = json_encode(['contacts' => $contacts]);
        $report->save();
        Alert::success('Report Submitted.', 'Thank you for helping us make OpenFarm a better place.')->persistent('Close');
        return redirect()->back();
    }

    public function addMessage(Request $request)
    {
        $data = (object)$request->all();
        $done = $this->message->create($data);
        if($done) echo 'done';
    }


    public function getMessages($contact_id)
    {
        $messages = $this->message->getMessages($this->user_id, $contact_id);
        return $messages;
    }

    public function getConversation($contact_id)
    {
        $conversation = $this->message->getConversation($contact_id);
        return $conversation;
    }
}
