<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
        ]);
        $post = Post::findOrFail($request->post_id);

        // Check if the user already liked the post
        if (!$post->isLikedBy(auth()->user())) {
            $post->likes()->create([
                'user_id' => auth()->id(),
            ]);
        }

        return back();
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
        ]);
        $post = Post::findOrFail($request->post_id);
        $post->likes()->where('user_id', auth()->id())->delete();

        return back();
    }
}
