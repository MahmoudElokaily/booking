<?php

namespace App\Http\Controllers\API;

use App\helpers\ImageHelpers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;



class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Create a token for the user
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            "success" => true,
            'access_token' => $token,
        ]);
    }

    public function register(Request $request)
    {
        // Validate the request
        $validation = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Handle image upload
        $photoName = null;
        if ($request->hasFile('image')) {
            $photoName = ImageHelpers::saveImage($request->file('image'), "images/{$request->name}");
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $photoName,
        ]);

        // Fire the Registered event
        event(new Registered($user));

        // Log in the user
        Auth::login($user);

        // Return a successful response
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }
}
