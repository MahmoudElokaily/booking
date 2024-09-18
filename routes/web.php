<?php

use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Like\LikeController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/owner-posts', [HomeController::class , 'ownerPosts'])->name('owner-posts');
Route::get('/tenant-posts', [HomeController::class , 'tenantPosts'])->name('tenant-posts');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('dashboard' , [ChatController::class , 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('chat/{id}' , [ChatController::class , 'chat'])->middleware(['auth', 'verified'])->name('chat');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin' , "as" => "admin." , "middleware" => "auth"] , function (){
   Route::get("create-post" , [PostController::class , "createPost"])->name("create-post");
   Route::post("store-post" , [PostController::class , "storePost"])->name("store-post");
   Route::get("delete-post/{id}" , [PostController::class , "deletePost"])->name("delete-post")->middleware('CheckPermission');
   // likes
    Route::post('/posts/like', [LikeController::class, 'store'])->name('posts.like');
    Route::post('/posts/unlike', [LikeController::class, 'destroy'])->name('posts.unlike');
});
Route::get("posts-search/{search}" , [PostController::class , "PostsSearch"])->name("posts-search");
require __DIR__.'/auth.php';
