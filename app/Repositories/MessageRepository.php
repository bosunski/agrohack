<?php

namespace App\Repositories;

use App\Message;
use DB;
use File;
use Auth;

class MessageRepository extends BaseRepository
{
    public function create($data)
    {
        return Message::create([
            'id'  => $this->generateUUID(),
            'sender_id' => Auth::user()->id,
            'recipient_id' => $data->recipient_id,
            'message' => $data->message,
            'read'    => 0,
        ]);
    }


    public function list()
    {
        $Messages = Message::where(
                            [
                                ['user_id', '=', Auth::user()->id],
                                ['recipient_id', '=', $recipient_id]
                            ]
                        )->get();
        return $Messages;
    }


    public function delete($Message_id)
    {
        $done = Message::where('id', '=', $Message_id)->delete();
        return true;
    }

    public function getUnreadMessage()
    {
        $Messages = Message::where(
                            [
                                ['user_id', '=', Auth::user()->id],
                                ['read', '=', 0]
                            ]
                        )->get();
        return $Messages;
    }

    public function getMessages($sender_id, $recipient_id)
    {
        $sender_id = Auth::user()->id;
        $Messages = Message::where(
                            [
                                ['sender_id', '=', $sender_id],
                                ['recipient_id', '=', $recipient_id]
                            ]
                        )->orWhere(
                            [
                                ['sender_id', '=', $recipient_id],
                                ['recipient_id', '=', $sender_id]
                            ]
                            )->orderBy('created_at', 'asc')->get();
        //dd($sender_id);
        // $messages = DB::table('messages')->select(
        //     DB::raw("(sender_id = '".Auth::user()->id."' AND recipient_id='$recipient_id') OR (recipient_id = '$sender_id' AND sender_id='$recipient_id')"))->get();
        return $Messages;
    }

    public function getMessage($Message_id)
    {
        return Message::where('id', $Message_id)->with('category')->first();
    }

    public function update($Message_id, $data)
    {
        return Category::where('id', $Message_id)->update($update);
    }
}
