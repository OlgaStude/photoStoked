<?php

namespace App\Http\Controllers;

use App\Models\Approved_m;
use App\Models\Collection;
use App\Models\Like;
use App\Models\Material_tag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class catalogController extends Controller
{
    public function index(Request $req)
    {
        Artisan::call('storage:link');
        if ($req->ajax()) {

            if ($req->tag_id) {

                $tags = Tag::where('id', '<', $req->tag_id)->orderBy('id', 'DESC')->paginate(5);
                $view = view('components.tags', compact('tags'));
                return $view;
            }

            if ($req->tag_name) {
                $materials = Material_tag::join('tags', 'tags.id', '=', 'material_tags.tags_id')
                    ->join('approved_ms', 'approved_ms.id', '=', 'material_tags.approved_ms_id')
                    ->where([
                        ['tags.tag_name', '=', $req->tag_name],
                        ['approved_ms.id', '<', $req->id]
                    ])
                    ->select('approved_ms.id', 'approved_ms.path', 'approved_ms.type', 'approved_ms.likes', 'tags.tag_name')
                    ->orderBy('approved_ms.id', 'desc')->paginate(2);
                $cur_id = 0;
                foreach ($materials as $row => $material) {
                    if ($material->id == $cur_id) {
                        unset($materials[$row]);
                    }
                    $cur_id = $material->id;
                }
            } elseif ($req->search_word) {
                if (count(Tag::where('tag_name', 'LIKE', '%' . $req->search_word . '%')->get()) > 0) {
                    $materials = Material_tag::join('tags', 'tags.id', '=', 'material_tags.tags_id')
                        ->join('approved_ms', 'approved_ms.id', '=', 'material_tags.approved_ms_id')
                        ->where([
                            ['tags.tag_name', 'LIKE', '%' . $req->search_word . '%'],
                            ['approved_ms.id', '<', $req->id]
                        ])
                        ->select('approved_ms.id', 'approved_ms.path', 'approved_ms.type', 'approved_ms.likes', 'tags.tag_name')
                        ->orderBy('approved_ms.id', 'desc')->paginate(2);
                    $cur_id = 0;
                    foreach ($materials as $row => $material) {
                        if ($material->id == $cur_id) {
                            unset($materials[$row]);
                        }
                        $cur_id = $material->id;
                    }
                } else {
                    $materials = Approved_m::where('id', '<', $req->id)->latest()->paginate(2);
                }
            } elseif ($req->type != '' && $req->dementions != '') {
                $materials = Approved_m::where([
                    ['type', '=', $req->type],
                    ['dimentions', '=', $req->dementions],
                    ['id', '<', $req->id]
                ])->latest()->paginate(2);
            } elseif ($req->type != '') {
                $materials = Approved_m::where([
                    ['type', '=', $req->type],
                    ['id', '<', $req->id]
                ])->latest()->paginate(2);
            } elseif ($req->dementions != '') {
                $materials = Approved_m::where([
                    ['dimentions', '=', $req->dementions],
                    ['id', '<', $req->id]
                ])->latest()->paginate(2);
            } else {
                $materials = Approved_m::where('id', '<', $req->id)->latest()->paginate(2);
            }
            if (Auth::check()) {
                $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
            } else {
                $collections = [];
            }

            $view = view('components.data', compact('materials', 'collections'));
            return $view;
        }
        $materials = Approved_m::latest()->paginate(2);
        if (Auth::check()) {
            $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
        } else {
            $collections = [];
        }

        $tags = Tag::orderBy('id', 'DESC')->paginate(5);
        $likes = Like::all();
        return view('catalog', compact('materials', 'tags', 'likes', 'collections'));
    }

}