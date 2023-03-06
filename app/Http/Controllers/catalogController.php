<?php

namespace App\Http\Controllers;

use App\Models\Approved_m;
use App\Models\Material_tag;
use App\Models\Tag;
use Illuminate\Http\Request;

class catalogController extends Controller
{
    public function index(Request $req){
        $materials = Approved_m::latest()->paginate(2);

        if($req->ajax()){
            if($req->search_word){
                if(count(Tag::where('tag_name', '=', $req->search_word)->get()) > 0){
                    $materials = Material_tag::join('tags', 'tags.id', '=', 'material_tags.tags_id')
                    ->leftJoin('approved_ms', 'approved_ms.id', '=', 'material_tags.approved_ms_id')
                    ->where([
                        ['tags.tag_name', '=', $req->search_word],
                        ['approved_ms.id', '<', $req->id]
                    ])
                    ->select('approved_ms.path', 'approved_ms.id', 'approved_ms.type', 'tags.tag_name')->paginate(2);
                }
            }
            elseif($req->type != '' && $req->dementions != ''){
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
