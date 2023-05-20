<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationValidationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function addUser(RegistrationValidationRequest $req){
        

        if($req->password == $req->password_check){
            $req->file('pfp')->store('public/profile_pics');
            $pfp_name = $req->file('pfp')->hashName();
            $user = User::create(array_merge($req->validated(), ['password' => Hash::make($req->password), 'path' => $pfp_name, 'followers' => 0, 'money' => 0]));
            if($user){
                Auth::login($user);
                return redirect('userpage');
            }
        }
        return redirect('registr');
    }
}
