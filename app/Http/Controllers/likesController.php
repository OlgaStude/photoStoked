<?php

namespace App\Http\Controllers;

use App\Models\Approved_m;
use App\Models\Like;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class likesController extends Controller
{
    public function like(Request $req){
        $exists = Like::where([
            ['users_id', '=', Auth::user()->id],
            ['approved_ms_id', '=', $req->id],
        ])->exists();
        if(!$exists){
            Approved_m::where("id", $req->id)->increment("likes");
            Like::create(['users_id' => Auth::user()->id, 'approved_ms_id' => $req->id]);
            if($req->user_id != Auth::user()->id)
                Message::create(['users_id' => Auth::user()->id, 'user_send_id' => $req->user_id, 'approved_ms_id' => $req->id, 'text' => 'понравилась ваша работа']);
        }else{
            Approved_m::where("id", $req->id)->decrement("likes");
            Like::where([
                ['users_id', '=', Auth::user()->id],
                ['approved_ms_id', '=', $req->id],
            ])->delete();
            Message::where([['users_id', '=', Auth::user()->id], ['user_send_id', '=', $req->user_id], ['approved_ms_id', '=', $req->id,]])->delete();
        }
    }

}
