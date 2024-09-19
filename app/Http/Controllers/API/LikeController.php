<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likePost(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
        ]);

        $post = Post::findOrFail($request->post_id);

        if (!$post->isLikedBy(auth()->user())) {
            $post->likes()->create([
                'user_id' => auth()->id(),
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Post liked successfully.']
                , 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Post already liked.'], 400);
    }

    public function unlikePost(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
        ]);

        $post = Post::findOrFail($request->post_id);

        $like = $post->likes()->where('user_id', auth()->id());
        if ($like->exists()) {
            $like->delete();
            return response()->json([
                'success' => true,
                'message' => 'Post unliked successfully.'],
            201);
        }

        return response()->json(['status' => false,'message' => 'Post was not liked.'], 400);
    }

    public function isPostLiked($post_id)
    {

        $post = Post::findOrFail($post_id);

        $isLiked = $post->isLikedBy(auth()->user());

        return response()->json([
            'success' => true,
            'liked' => $isLiked
        ]);
    }


}
