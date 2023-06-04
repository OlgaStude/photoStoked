<?php

namespace App\Http\Controllers;

use App\Http\Requests\approvalRequest;
use App\Models\Approved_m;
use App\Models\Material_tag;
use App\Models\Sent_material;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class approveController extends Controller
{
    public function show(){
        if(!Auth::check() || !Auth::user()->is_admin){
            return redirect('mainpage');
        }

        $materials = Sent_material::all();
        return view('approvalPage',compact('materials'));
    }
    
    public function delete($id)
    {
        Storage::delete("public/sent_materials/".Sent_material::find($id)->path);
        Sent_material::find($id)->delete();
        return redirect()->back();
    }

    public function download($id){
        $path = "public/sent_materials/".Sent_material::find($id)->path;

        return Storage::download($path);
    }

    public function send(approvalRequest $req){
        $req->file('material')->store('public/approved_materials');
        $material_name = $req->file('material')->hashName();
        $original_name = Sent_material::find($req->material_id)->path;
        
        Approved_m::create(array_merge($req->validated(), ['path' => $material_name, 'original_path' => $original_name, 'likes' => 0]));
        
        $tags = explode(',',$req->tags);

        foreach($tags as $tag){
            $exists = Tag::where('tag_name', $tag)->exists();
            if(!$exists){
                Tag::create(['tag_name' => $tag]);
            }
            Material_tag::create(['approved_ms_id' => $req->material_id, 'tags_id' => Tag::where('tag_name', $tag)->value('id')]);
        }

        Storage::move("public/sent_materials/".$original_name, "public/original_imgs/".$original_name);
        Sent_material::find($req->material_id)->delete();
        return redirect()->back();

    }
}
