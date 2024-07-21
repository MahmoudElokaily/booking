<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function dashboard() {
        return view('dashboard');
    }

    public function chat($id) {
        return view('pages.chat' , compact('id'));
    }
}
