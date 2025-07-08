<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::get();

        // $comments = Comment::all();

        if ($comments->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No posts found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Comments fetched successfully',
            'data' => $comments
        ]);
    }
    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
            'content' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        if (!Post::find($request->post_id)) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
            ], 404);
        }

        $comments = Comment::create([
            'user_id' => $user->id,
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment created successfully',
            'data' => $comments
        ]);
    }

    public function destroy(string $id)
    {
        if (!Comment::find($id)) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found',
            ], 404);
        }

        Comment::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted successfully'
        ], 200);
    }
}
