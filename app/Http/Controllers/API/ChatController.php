<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function latestChats()
    {
        // Get the currently authenticated user
        $userId = Auth::id();

        // Get the latest users the authenticated user has chatted with, ordered by the latest message
        $latestChats = Message::where('sender_id', Auth::id())
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver']) // Load related sender and receiver
            ->orderBy('created_at', 'desc') // Order by latest message
            ->get()
            ->unique(function ($message) use ($userId) {
                // Group messages by the other user in the chat
                return $message->sender_id == $userId ? $message->receiver_id : $message->sender_id;
            });
        return response()->json([
            'status' => true,
            'message' => 'Latest chats',
            'chats' => $latestChats,
        ], 200);
    }
    public function chatWith($receiverId)
    {
        // Get the currently authenticated user
        $userId = Auth::id();

        // Validate that receiver ID is provided and is different from the current user
        if (!$receiverId || $receiverId == $userId) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid receiver ID',
            ], 400);
        }

        // Fetch all messages between the current user and the specified receiver
        $messages = Message::where(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $receiverId);
        })
            ->orWhere(function ($query) use ($userId, $receiverId) {
                $query->where('sender_id', $receiverId)
                    ->where('receiver_id', $userId);
            })
            ->orderBy('created_at', 'asc') // Order messages by creation time, ascending
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Messages retrieved',
            'messages' => $messages,
        ], 200);
    }
}
