<?php

namespace App\Repositories;

use App\Message;

use File;

class MessageRepository extends BaseRepository
{
    public function create($data)
    {
        return Message::create([
            'id'  => $this->generateUUID(),
            'user_id' => Auth::user()->id,
            'Message_id' => $data->Message_id,
            'accepted'    => 0,
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

    public function getMessage($Message_id)
    {
        return Message::where('id', $Message_id)->with('category')->first();
    }

    public function update($Message_id, $data)
    {
        return Category::where('id', $Message_id)->update($update);
    }
}
