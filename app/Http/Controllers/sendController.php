<?php

namespace App\Http\Controllers;

use App\Http\Requests\sendRequest;
use App\Models\Message;
use App\Models\Sent_material;
use Illuminate\Support\Facades\Auth;

class sendController extends Controller
{
    public function send(sendRequest $req){
        $req->file('material')->store('public/sent_materials');
        $material_name = $req->file('material')->hashName();
        $tags = str_replace(', ', ',', $req->tags);
        $material = Sent_material::create(array_merge($req->validated(), ['path' => $material_name, 'users_id' => Auth::user()->id, 'tags' => $tags]));
        if($material){
            $success_message = $req->session()->put('success_message', 'Отправка успешна!');
            return redirect('sending')->with($success_message);
        }
    }
}
