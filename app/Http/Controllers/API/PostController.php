<?php

namespace App\Http\Controllers\API;

use App\helpers\ImageHelpers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post($postId){
        $post = Post::findOrFail($postId);
        dd($post->likes);
        return response()->json([
            'message' => 'One Post',
            'posts' => $post
        ], 200);
    }

    public function all() {
        $posts = Post::all();
        return response()->json([
            'message' => 'all posts',
            'posts' => $posts
        ], 200);
    }

    public function lookingPosts() {
        $posts = Post::with('user')
            ->where('type'  , "Looking")
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json([
            'message' => 'looking posts',
            'posts' => $posts
        ], 200);
    }
    public function offerPosts() {
        $posts = Post::with('user')
            ->where('type' , "Offer")
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json([
            'message' => 'Offer posts',
            'posts' => $posts
        ], 200);
    }

    public function createPost(Request $request) {
        $request->validate([
            "description" => "required",
            "type" => "required",
        ]);
        $fileNames = null;
        $imagesName = [];

        // Handle image upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = ImageHelpers::saveImage($image, 'images/owner/' . Auth::user()->name);
                $imagesName[] = $imageName;
                sleep(1); // Consider removing or reducing sleep time in production
            }
            $fileNames = json_encode($imagesName);
        }
        $post = Post::create([
            'description'   => $request->description,
            'user_id'       => Auth::id(),
            'fileNames'     => $fileNames,
            'type'          => $request->type
        ]);
        return response()->json([
            'message' => 'post created',
            'post' => $post
        ] , 201);
    }
}
