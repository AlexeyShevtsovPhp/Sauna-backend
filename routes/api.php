<?php

use App\Http\Controllers\AvatarUploadController;
use App\Http\Controllers\BookSaunaController;
use App\Http\Controllers\GetBookingByDateController;
use App\Http\Controllers\GetProfileBookingController;
use App\Http\Controllers\GetSaunaInfoController;
use App\Http\Controllers\GetUserInfoController;
use App\Http\Controllers\SaunaListController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\UserUpdateController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/nameAndAvatar', [GetUserInfoController::class, 'nameAndAvatar']);
    Route::get('/profileInfo', [GetUserInfoController::class, 'profileInfo']);
    Route::get('/saunaInfo/{id}', [GetSaunaInfoController::class, 'get']);
    Route::post('/bookings', [BookSaunaController::class, 'book']);
    Route::delete('/deleteBook/{bookingId}', [BookSaunaController::class, 'remove']);
    Route::get('/bookDateInfo', [GetBookingByDateController::class, 'get']);
    Route::get('/profile/saunas', [GetProfileBookingController::class, 'get']);
    Route::post('/user/update', [UserUpdateController::class, 'update']);
    Route::post('/uploadAvatar', [AvatarUploadController::class, 'upload']);
});

Route::post('/login', [UserLoginController::class, 'login']);

Route::post('/registration', [UserRegistrationController::class, 'create']);

Route::get('/saunaList', [SaunaListController::class, 'get']);
