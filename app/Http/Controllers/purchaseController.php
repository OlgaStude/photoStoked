<?php

namespace App\Http\Controllers;

use App\Models\Approved_m;
use App\Models\Bought_material;
use App\Models\Message;
use App\Models\Pakege;
use App\Models\Sent_material;
use App\Models\User;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class purchaseController extends Controller
{
    public function buy(Request $req)
    {
        Pakege::where('users_id', '=', Auth::user()->id)->decrement("purchases_left");
        $pakege = Pakege::where('users_id', '=', Auth::user()->id)->get();
        if ($pakege[0]->purchases_left == 0) {
            Pakege::where('users_id', '=', Auth::user()->id)->delete();
        }
        Bought_material::create(['users_id' => Auth::user()->id, 'approved_ms_id' => $req->material_id]);
        $user = User::where("id", '=', $req->user_id)->get();
        $money = $user[0]->money + 100;
        User::where("id", $req->user_id)->update(["money" => $money]);
        Message::create(['users_id' => Auth::user()->id, 'user_send_id' => $req->user_id, 'approved_ms_id' => 0, 'message_type' => 'purchase', 'text' => 'скачал вашу работу']);
    }

    public function download($id)
    {
        $path = "public/approved_materials/" . Approved_m::find($id)->path;

        return Storage::download($path);
    }

    public function buypackege(Request $req)
    {
        $exists = Pakege::where('users_id', '=', Auth::user()->id)->exists();
        if(!$exists){
            Pakege::create(['users_id' => Auth::user()->id, 'purchases_left' => $req->ammount]);
        } else {
            $packege = Pakege::where('users_id', '=', Auth::user()->id)->get();
            $ammount = $packege[0]->purchases_left + $req->ammount;
            Pakege::where('users_id', '=', Auth::user()->id)->update(['purchases_left' => $ammount]);
        }
    }
}
