<?php

namespace App\Http\Controllers\Post;

use App\helpers\ImageHelpers;
use App\Http\Controllers\Controller;
use App\Models\OnwerPost;
use App\Models\Post;
use App\Models\TenantPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function createPost()
    {
        $data["title"] = "Create Post";
        return view("pages.create-post" , $data);
    }

    public function storePost(Request $request) {
        $request->validate([
            "description" => "required",
            "type" => "required",
        ]);
        $fileNames = NULL;
        $imagesName = [];
        if (isset($request->images)) {
            foreach ($request->images as $image) {
                $imageName = ImageHelpers::saveImage($image, "images/owner/" . Auth::user()->name);
                $imagesName[] = $imageName;
                sleep(1);
            }
            $fileNames = json_encode($imagesName);
        }
       Post::create([
            'description'   => $request->description,
            'user_id'       => Auth::id(),
            'fileNames'     => $fileNames,
            'type'          => $request->type
        ]);
        return to_route('dashboard');
    }

    public function deletePost(Request $request) {
        $user = Auth::user();
        $post = Post::findOrFail($request->id)->delete();
        return to_route('dashboard');
    }

    public function PostsSearch($search) {
        $data['data'] = __("Home");
        $data['posts'] = Post::where('description', 'LIKE', "%{$search}%")->with('user')->paginate(6);
        return view('pages.search', $data);
    }
}
