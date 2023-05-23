<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Subscriptions;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class followController extends Controller
{
    public function follow(Request $req){
        $exists = Subscriptions::where([
            ['users_id', '=', Auth::user()->id],
            ['followed_id', '=', $req->followed_id],
        ])->exists();
        if(!$exists){
            Subscriptions::create(['users_id' => Auth::user()->id, 'followed_id' => $req->followed_id]);
            User::where("id", $req->followed_id)->increment("followers");
            Message::create(['users_id' => Auth::user()->id, 'user_send_id' => $req->followed_id, 'approved_ms_id' => 0, 'text' => 'добавил вас в избранное']);
        } else{
            User::where("id", $req->followed_id)->decrement("followers");
            Subscriptions::where([
                ['users_id', '=', Auth::user()->id],
                ['followed_id', '=', $req->followed_id],
            ])->delete();
            Message::where([['users_id', '=', Auth::user()->id], ['user_send_id', '=', $req->followed_id], ['approved_ms_id', '=', '0']])->delete();

        }
    }
}
