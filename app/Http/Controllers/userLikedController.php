<?php

namespace App\Http\Controllers;

use App\Models\Approved_m;
use App\Models\Collection;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userLikedController extends Controller
{
    public function show(Request $req)
    {
        if ($req->ajax()) {
            $materials = Like::join('users', 'users.id', '=', 'likes.users_id')
                ->join('approved_ms', 'approved_ms.id', '=', 'likes.approved_ms_id')
                ->where([
                    ['users.id', '=', Auth::user()->id],
                    ['approved_ms.id', '<', $req->id]
                ])
                ->select('approved_ms.id', 'approved_ms.path', 'approved_ms.type', 'approved_ms.likes')
                ->orderBy('approved_ms.id', 'desc')->paginate(4);
            if (Auth::check()) {
                $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
            } else {
                $collections = [];
            }
            $view = view('components.data', compact('materials', 'collections'));
            return $view;
        } else {

            $materials = Like::join('users', 'users.id', '=', 'likes.users_id')
                ->join('approved_ms', 'approved_ms.id', '=', 'likes.approved_ms_id')
                ->where('users.id', '=', Auth::user()->id)
                ->select('approved_ms.id', 'approved_ms.path', 'approved_ms.type', 'approved_ms.likes')
                ->orderBy('approved_ms.id', 'desc')->paginate(4);
            if (Auth::check()) {
                $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
            } else {
                $collections = [];
            }
            return view('userLikedPage', compact('materials', 'collections'));
        }

        return redirect('mainpage');
    }
}