<?php

namespace App\Http\Middleware;

use App\Models\OnwerPost;
use App\Models\TenantPost;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user->role == "owner"){
            $post = OnwerPost::findOrFail($request->id);
        }
        else if ($user->role == "tenant"){
            $post = TenantPost::findOrFail($request->id);
        }
        if (Auth::check() && (($post->user_id == $user->id) || ($user->role == "SuperAdmin"))) {
            return $next($request);
        }
        return view("home");
    }
}
