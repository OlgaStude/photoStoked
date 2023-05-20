<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateDataRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class userDataUpdateController extends Controller
{
    public function show()
    {
        if(Auth::check()){
            return view('userDataUpdate');
        } else {
            return redirect('mainpage');
        }
    }

    public function updateData(updateDataRequest $req){
        
        
        if($req->name){
            User::where("id", $req->id)->update(["name" => $req->name]);
        }
        if($req->surname){
            User::where("id", $req->id)->update(["surname" => $req->surname]);
        }
        if($req->nikname){
            User::where("id", $req->id)->update(["nikname" => $req->nikname]);
        }
        if($req->email){
            User::where("id", $req->id)->update(["email" => $req->email]);
        }
        if($req->hasFile('pfp')){
            $req->file('pfp')->store('public/profile_pics');
            $material_name = $req->file('pfp')->hashName();

            Storage::delete("public/profile_pics/".User::find($req->id)->path);


            User::where("id", $req->id)->update(["path" => $material_name]);

        }
        if($req->birthdate){
            User::where("id", $req->id)->update(["birthdate" => $req->birthdate]);
        }
        if($req->add_info){
            User::where("id", $req->id)->update(["add_info" => $req->add_info]);
        }else{
            User::where("id", $req->id)->update(["add_info" => NUll]);
        }
            return redirect()->back();   
    }
}
