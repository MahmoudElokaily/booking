<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    dd("test");
    return $request->user();
})->middleware('');
Route::group(["middleware" => "auth:sanctum"], function () {
    Route::post("create-post" , [PostController::class , "createPost"]);
});
Route::post("/login" , [AuthController::class , "login"]);
Route::post("/register" , [AuthController::class , "register"]);
Route::get("/posts" , [PostController::class , "all"]);
Route::get("/offer-posts" , [PostController::class , "offerPosts"]);
Route::get("/looking-posts" , [PostController::class , "lookingPosts"]);
Route::get("/post/{post_id}" , [PostController::class , "post"]);

