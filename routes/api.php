<?php

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ArtistController;
use App\Http\Controllers\API\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group( function () {
    Route::controller(UserController::class)->group(function(){
        Route::get('user', 'getUser');
        Route::post('user/upload_avatar', 'uploadAvatar');
        Route::delete('user/remove_avatar','removeAvatar');
        Route::post('user/send_verification_email','sendVerificationEmail');
        Route::post('user/change_email', 'changeEmail');
    });

    Route::resource('artists', ArtistController::class);

    Route::get('/genres', [GenreController::class, 'index']);

});

// Fetch all books
// Route::get('/books', [BookController::class, 'index']);
// // Fetch a specific book by ID
// Route::get('/books/{id}', [BookController::class, 'show']);