<?php

namespace App\Http\Controllers;

use App\Models\Approved_m;
use App\Models\Collection;
use App\Models\Pakege;
use App\Models\User;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class redirectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $req)
    {
        if($req->ajax()){
            $materials = Approved_m::where([
                ['id', '<', $req->id],
                ['users_id', '=', $id]
                ])->latest()->paginate(6);
                if(Auth::check()){
                    $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
                }else{
                    $collections = [];
                }
        
            $view = view('components.data', compact('materials', 'collections'));
            return $view;
        }
        else 
        if(User::where('id','=', $id)->exists()){
            
        
            $materials = Approved_m::where('users_id', '=', $id)->orderBy('id', 'DESC')->paginate(6);
            if(Auth::check()){
                $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
            }else{
                $collections = [];
            }
            if(Pakege::where('users_id', '=', $id)->exists()){
                $package = Pakege::where('users_id', '=', $id)->get();
            }else{
                $package = [];
            }
            return view('userPage', compact('materials', 'collections', 'package'));
        }
        else {
        return redirect('mainpage');
    }
}

    public function drain(){
        User::where("id", Auth::user()->id)->update(["money" => 0]);
        return '0';
    }
   
}
