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
        $post = Post::withCount('likes')->findOrFail($postId); // Automatically adds a `likes_count` attribute
        $likeCount = $post->likes->count(); // Assuming `likes` is a relationship
        $imageUrls = [];
        if ($post->fileNames) {
            $fileNames = json_decode($post->fileNames);
            foreach ($fileNames as $file) {
                $imageUrls[] = asset('images/owner/' . $post->user->name . '/' . $file);
            }
        }
        $post->images = $imageUrls;
        return response()->json([
            'status' => true,
            'message' => 'One Post',
            'post' => $post,
            'likes_count' => $likeCount // Add number of likes to response
        ], 200);
    }

    public function all() {
        $posts = Post::withCount('likes')->get();
        $posts->each(function ($post) {
            $imageUrls = [];
            if ($post->fileNames) {
                $fileNames = json_decode($post->fileNames);
                foreach ($fileNames as $file) {
                    $imageUrls[] = asset('images/owner/' . $post->user->name . '/' . $file);
                }
            }
            // Add the image URLs as a new attribute in the post
            $post->images = $imageUrls;
        });

        return response()->json([
            'status' => true,
            'message' => 'all posts',
            'posts' => $posts
        ], 200);
    }

    public function lookingPosts() {
        $posts = Post::with('user')
            ->withCount('likes')
            ->where('type'  , "Looking")
            ->orderBy('created_at', 'desc')
            ->get();
        $posts->each(function ($post) {
            $imageUrls = [];
            if ($post->fileNames) {
                $fileNames = json_decode($post->fileNames);
                foreach ($fileNames as $file) {
                    $imageUrls[] = asset('images/owner/' . $post->user->name . '/' . $file);
                }
            }
            // Add the image URLs as a new attribute in the post
            $post->images = $imageUrls;
        });

        return response()->json([
            'status' => true,
            'message' => 'looking posts',
            'posts' => $posts
        ], 200);
    }
    public function offerPosts() {
        $posts = Post::with('user')
            ->withCount('likes') // Adds the `likes_count` attribute
            ->where('type', 'Offer')
            ->orderBy('created_at', 'desc')
            ->get();
        $posts->each(function ($post) {
            $imageUrls = [];
            if ($post->fileNames) {
                $fileNames = json_decode($post->fileNames);
                foreach ($fileNames as $file) {
                    $imageUrls[] = asset('images/owner/' . $post->user->name . '/' . $file);
                }
            }
            // Add the image URLs as a new attribute in the post
            $post->images = $imageUrls;
        });

        return response()->json([
            'status' => true,
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
            'status' => true,
            'message' => 'post created',
            'post' => $post
        ] , 201);
    }

    public function search($search) {
        $posts = Post::where('description', 'LIKE', "%{$search}%")->with('user')->get();
        $posts->each(function ($post) {
            $imageUrls = [];
            if ($post->fileNames) {
                $fileNames = json_decode($post->fileNames);
                foreach ($fileNames as $file) {
                    $imageUrls[] = asset('images/owner/' . $post->user->name . '/' . $file);
                }
            }
            // Add the image URLs as a new attribute in the post
            $post->images = $imageUrls;
        });
        return response()->json([
            'status' => true,
            'message' => 'post created',
            'post' => $posts
        ] , 201);
    }
}
