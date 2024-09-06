<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\OnwerPost;
use App\Models\Post;
use App\Models\TenantPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $data['title'] = __("Home");
        $data['posts'] = Post::with('user')->orderBy('created_at', 'desc')->limit(10)->get()->toArray();
        return view('pages.home' , $data);
    }
    public function ownerPosts() {
        $data['title'] = __("Looking");
        $data['posts'] = Post::with('user')
            ->where('fileNames' , '!=' , "")
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        return view('pages.owner-posts' , $data);
    }
    public function tenantPosts() {
        $data['title'] = __("Offering");
        $data['posts'] = Post::with('user')
            ->where('fileNames' , "")
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        return view('pages.tenant-posts' , $data);
    }
}
