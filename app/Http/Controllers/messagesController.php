<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class messagesController extends Controller
{
    public function show_messages(){
        $messages = Message::join('users', 'users.id', '=', 'messages.users_id')
                ->where('user_send_id', '=', Auth::user()->id)
                ->select('messages.id', 'messages.user_send_id', 'users.nikname', 'messages.text', 'users.path')
                ->paginate(10);
        $view = view('components.message', compact('messages'));
        return $view;
    }

    public function delete_messages(Request $req){
        Message::where('id', '=', $req->id)->delete();
        $messages = Message::join('users', 'users.id', '=', 'messages.users_id')
                ->where('user_send_id', '=', Auth::user()->id)
                ->select('messages.id', 'messages.user_send_id', 'users.nikname', 'messages.text', 'users.path')
                ->paginate(10);
        $view = view('components.message', compact('messages'));
        return $view;
    }
}
