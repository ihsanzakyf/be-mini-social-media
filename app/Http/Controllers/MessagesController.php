<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required',
            'message_content' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $message = Message::create([
            'sender_id' => $user->id,
            'receiver_id' => $request->receiver_id,
            'message_content' => $request->message_content,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully',
            'data' => $message
        ], 201);
    }

    public function show(string $id)
    {
        if (!Message::find($id)) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found',
            ], 404);
        }

        $messages = Message::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Messages retrieved successfully',
            'data' => $messages
        ], 200);
    }

    public function destroy(string $id)
    {
        if (!Message::find($id)) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found',
            ], 404);
        }

        Message::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Message deleted successfully'
        ], 200);
    }

    public function getAllMessages(string $id)
    {
        $messages = Message::where('receiver_id', $id)->get();

        return response()->json([
            'status' => true,
            'message' => 'All messages successfully',
            'data' => $messages
        ]);
    }
}
