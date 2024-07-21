<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\OnwerPost;
use App\Models\TenantPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $data['title'] = __("Home");
        $ownerPosts = OnwerPost::with('user')->inRandomOrder()->limit(10)->get()->toArray();
        $tenantPost = TenantPost::with('user')->inRandomOrder()->limit(10)->get()->toArray();
        $data['posts'] = array_merge($ownerPosts , $tenantPost);
        shuffle($data['posts']);
        return view('pages.home' , $data);
    }
    public function ownerPosts() {
        $data['title'] = __("Owner posts");
        $data['posts'] = OnwerPost::with('user')->paginate(4);
        return view('pages.owner-posts' , $data);
    }
    public function tenantPosts() {
        $data['title'] = __("Tenant posts");
        $data['posts'] = TenantPost::with('user')->paginate(6);
        return view('pages.tenant-posts' , $data);
    }
}
