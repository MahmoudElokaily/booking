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
        $data['posts'] = Post::with('user')->inRandomOrder()->limit(10)->get()->toArray();
        return view('pages.home' , $data);
    }
    public function ownerPosts() {
        $data['title'] = __("Owner posts");
        $data['posts'] = Post::with('user')->whereNotNull('fileNames')->paginate(4);
        return view('pages.owner-posts' , $data);
    }
    public function tenantPosts() {
        $data['title'] = __("Tenant posts");
        $data['posts'] = Post::with('user')->whereNull('fileNames')->paginate(6);
        return view('pages.tenant-posts' , $data);
    }
}
