<?php

namespace App\Http\Controllers;

use App\Http\Requests\coverRequest;
use App\Models\Approved_m;
use App\Models\Collection;
use App\Models\Collection_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class collectionsController extends Controller
{
    public function show_collections(Request $req)
    {
        if (Auth::check()) {
            if ($req->ajax()) {
                $users_collections = Collection::where([
                    ['users_id', '=', Auth::user()->id],
                    ['id', '<', $req->id]
                ])->orderBy('id', 'desc')->paginate(6);
                $view = view('components.collections', compact('users_collections'));
                return $view;
            }
            $users_collections = Collection::where('users_id', '=', Auth::user()->id)->orderBy('id', 'desc')->paginate(6);
            return view('collections', compact('users_collections'));
        }
    }
    public function show($id, Request $req)
    {
        if (Auth::check()) {
            if ($req->ajax()) {
                $pop_materials = Collection_item::join('approved_ms', 'approved_ms.id', '=', 'collection_items.approved_ms_id')
                ->join('users', 'users.id', '=', 'approved_ms.users_id')
                ->where([
                    ['collections_id', '=', $id],
                    ['collection_items.id', '>', $req->id]
                ])
                ->select('approved_ms.id', 'approved_ms.path', 'approved_ms.likes', 'approved_ms.type', 'approved_ms.dimentions', 'collection_items.id as ci_id', 'users.id as users_id')
                ->paginate(6);
                $collection = Collection::where('id', '=', $id)->get();
                $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
                $view = view('components.collection_items', compact('pop_materials', 'collection', 'collections'));
                return $view;
            }
            $pop_materials = Collection_item::join('approved_ms', 'approved_ms.id', '=', 'collection_items.approved_ms_id')
                ->join('users', 'users.id', '=', 'approved_ms.users_id')
                ->where('collections_id', '=', $id)
                ->select('approved_ms.id', 'approved_ms.path', 'approved_ms.likes', 'approved_ms.type', 'approved_ms.dimentions', 'collection_items.id as ci_id', 'users.id as users_id')
                ->paginate(6);
            $collection = Collection::where('id', '=', $id)->get();
            $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
            return view('collectionPage', compact('pop_materials', 'collection', 'collections'));
        }
    }
    public function make(Request $req)
    {
        Collection::create(['users_id' => Auth::user()->id, 'name' => $req->name, 'path' => '']);
        $users_collections = Collection::where('users_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
        $view = view('components.collections', compact('users_collections'));
        return $view;
    }

    public function add(Request $req)
    {
        $exists = Collection_item::where([
            ['collections_id', '=', $req->collections_id],
            ['approved_ms_id', '=', $req->approved_ms_id]
        ])->exists();
        if (!$exists) {
            Collection_item::create(['collections_id' => $req->collections_id, 'approved_ms_id' => $req->approved_ms_id]);
            $path = Approved_m::where('id', '=', $req->approved_ms_id)->get();
            $collection = Collection::where("id", '=', $req->collections_id)->get();
            if ($collection[0]->path == '') {
                if($path[0]->type != 'video'){
                    Collection::where("id", $req->collections_id)->update(["path" => $path[0]->path]);
                }
            }
        }
    }

    public function remove(Request $req)
    {
        Collection_item::where([
            ['collections_id', '=', $req->collection_id],
            ['approved_ms_id', '=', $req->material_id]
        ])->delete();
        $pop_materials = Collection_item::join('approved_ms', 'approved_ms.id', '=', 'collection_items.approved_ms_id')
                ->join('users', 'users.id', '=', 'approved_ms.users_id')
                ->where('collections_id', '=', $req->collection_id)
                ->select('approved_ms.id', 'approved_ms.path', 'approved_ms.likes', 'approved_ms.type', 'approved_ms.dimentions', 'collection_items.id as ci_id', 'users.id as users_id')
                ->paginate(100);
        $collection = Collection::where('id', '=', $req->collection_id)->get();
        $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
        $view = view('components.collection_items', compact('pop_materials', 'collection', 'collections'));
        return $view;
    }

    public function delete(Request $req)
    {
        Collection_item::where('collections_id', '=', $req->id)->delete();
        Collection::find($req->id)->delete();
        $users_collections = Collection::where('users_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
        $view = view('components.collections', compact('users_collections'));
        return $view;
    }

    public function change_cover(coverRequest $req)
    {
        $req->file('cover')->store('public/collection_covers');
        $pfp_name = $req->file('cover')->hashName();
        Collection::where("id", $req->id)->update(["path" => $pfp_name]);
    }
}