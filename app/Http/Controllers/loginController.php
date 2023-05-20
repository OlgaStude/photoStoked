<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\Bought_material;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function loginUser(loginRequest $req)
    {
        $formFields = $req->only(['email', 'password']);


        if (Auth::attempt($formFields)) {
            $user = User::where("email", $formFields['email'])->get();
            return redirect('userpage/' . $user['0']->id);
        }

        return redirect(route('userLogin'))->withErrors([
            'formError' => 'Не верный логин или пароль'
        ]);
    }
}
