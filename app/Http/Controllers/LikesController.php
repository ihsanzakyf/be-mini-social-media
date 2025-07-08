<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LikesController extends Controller
{
    public function like(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
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

        if (!Like::where('user_id', $user->id)->where('post_id', $request->post_id)->exists()) {
            $like = Like::create([
                'user_id' => $user->id,
                'post_id' => $request->post_id,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Post liked successfully',
                'data' => $like
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Post already liked',
        ], 400);
    }

    public function unlike(string $id)
    {
        if (!Like::find($id)) {
            return response()->json([
                'success' => false,
                'message' => 'Like not found',
            ], 404);
        }

        Like::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Like deleted successfully'
        ], 200);
    }
}
