<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\JWTMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Hanle Auth
    Route::post('register', [JWTAuthController::class, 'register']);
    Route::post('login', [JWTAuthController::class, 'login']);

    // Handle posts API routes
    Route::middleware(JWTMiddleware::class)->prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index']);
        Route::post('/', [PostController::class, 'store']);
        Route::get('/{id}', [PostController::class, 'show']);
        Route::put('/{id}', [PostController::class, 'update']);
        Route::delete('/{id}', [PostController::class, 'destroy']);
    });

    // Handle comments API routes
    Route::middleware(JWTMiddleware::class)->prefix('comments')->group(function () {
        Route::get('/', [CommentsController::class, 'index']);
        Route::post('/', [CommentsController::class, 'store']);
        Route::delete('/{id}', [CommentsController::class, 'destroy']);
    });

    // Handle likes API routes
    Route::middleware(JWTMiddleware::class)->prefix('likes')->group(function () {
        Route::post('/', [LikesController::class, 'like']);
        Route::delete('/{id}', [LikesController::class, 'unlike']);
    });

    // Handle messages API routes
    Route::middleware(JWTMiddleware::class)->prefix('messages')->group(function () {
        Route::get('getAllMessages/{receiver_id}', [MessagesController::class, 'getAllMessages']);
        Route::post('/', [MessagesController::class, 'store']);
        Route::get('/{id}', [MessagesController::class, 'show']);
        Route::delete('/{id}', [MessagesController::class, 'destroy']);
    });
});
