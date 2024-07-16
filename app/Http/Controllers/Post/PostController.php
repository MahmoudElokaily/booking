<?php

namespace App\Http\Controllers\Post;

use App\helpers\ImageHelpers;
use App\Http\Controllers\Controller;
use App\Models\OnwerPost;
use App\Models\TenantPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create() {
        $data["title"] = "Create Post";
        $user = Auth::user();
        return view("pages.create-post" , $data);
    }

    public function storeOwnerPost(Request $request) {
        $request->validate([
            "description" => "required",
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagesName = [];
        foreach ($request->images as $image) {
            $imageName = ImageHelpers::saveImage($image, "images/owner/" . Auth::user()->name . Auth::id());
            $imagesName[] = $imageName;
            sleep(1);
        }
        $fileNames = json_encode($imagesName);
        OnwerPost::create([
            'description'   => $request->description,
            'user_id'       => Auth::id(),
            'fileNames'     => $fileNames
        ]);
        return view('dashboard');
    }

    public function storeTenantPost(Request $request) {
        $request->validate([
            "description" => "required",
        ]);
        TenantPost::create([
            'description'  => $request->description,
            'user_id'       => Auth::id(),
        ]);
        return view('dashboard');
    }

    public function deletePost(Request $request) {
        $user = Auth::user();
        if ($user->role == "owner"){
            $post = OnwerPost::findOrFail($request->id)->delete();
        }
        else if ($user->role == "tenant"){
            $post = TenantPost::findOrFail($request->id)->delete();
        }
        return view('dashboard');
    }
}
