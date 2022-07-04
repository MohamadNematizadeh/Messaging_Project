<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    function index()
    {
        $messages = Message::all();

        return view("welcome", [
            "messages" => $messages
        ]);
    }
    function add(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:256',
            'text'=>'required|max:256',
            'email'=>'required|email',
            'age'=>'min:1|max:150',
            'password1'=>'min:6|same:password2'
            ]);
        $message = new Message();
        $message->id = $request["id"];
        $message->name = $request["name"];
        $message->text = $request["text"];
        $message->save();
        $messages = Message::all();

        return view("welcome", [
            "messages" => $messages
        ]);

    }

}
