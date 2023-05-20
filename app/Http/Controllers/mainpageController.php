<?php

namespace App\Http\Controllers;

use App\Models\Approved_m;
use App\Models\Collection;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class mainpageController extends Controller
{
    public function index(Request $req){
        Artisan::call('storage:link');
        if($req->ajax()){
            $materials = Approved_m::where('id', '<', $req->id)->latest()->paginate(2);
            if(Auth::check()){
                $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
            }else{
                $collections = [];
            }
            $view = view('components.data', compact('materials', 'collections'));
            return $view;
        }
        $materials = Approved_m::latest()->paginate(2);
        $pop_materials = Approved_m::orderBy('likes', 'desc')->paginate(2);
        $pop_authors = User::orderBy('followers', 'desc')->paginate(2);
        if(Auth::check()){
            $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
        }else{
            $collections = [];
        }
        return view('mainPage', compact('materials', 'pop_materials', 'pop_authors', 'collections'));
    }
}
