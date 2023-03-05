<?php

namespace App\Http\Controllers;

use App\Models\Approved_m;
use Illuminate\Http\Request;

class catalogController extends Controller
{
    public function index(Request $req){
        $materials = Approved_m::latest()->paginate(2);

        if($req->ajax()){
            if($req->type != '' && $req->dementions != ''){
                $materials = Approved_m::where([
                    ['type', '=', $req->type],
                    ['dimentions', '=', $req->dementions],
                    ['id', '<', $req->id]
                ])->latest()->paginate(2);
            }
            elseif($req->type != ''){
                $materials = Approved_m::where([
                    ['type', '=', $req->type],
                    ['id', '<', $req->id]
                ])->latest()->paginate(2);
            }
            elseif($req->dementions != ''){
                $materials = Approved_m::where([
                    ['dimentions', '=', $req->dementions],
                    ['id', '<', $req->id]
                ])->latest()->paginate(2);
            }
            else{
                $materials = Approved_m::where('id', '<', $req->id)->latest()->paginate(2);
            }
            $view = view('components.data', compact('materials'));
            return $view;
        }
        return view('catalog', compact('materials'));
    }

}
