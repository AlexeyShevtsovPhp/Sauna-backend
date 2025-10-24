<?php

use App\Http\Controllers\AvatarUploadController;
use App\Http\Controllers\BlockUserController;
use App\Http\Controllers\BookSaunaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DeleteUserController;
use App\Http\Controllers\GetBookingByDateController;
use App\Http\Controllers\GetProfileBookingController;
use App\Http\Controllers\GetSaunaInfoController;
use App\Http\Controllers\GetUserInfoController;
use App\Http\Controllers\GetUserListController;
use App\Http\Controllers\SaunaListController;
use App\Http\Controllers\SaunaRateController;
use App\Http\Controllers\SortDataController;
use App\Http\Controllers\UpdateSaunaDataController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\UserUpdateController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/nameAndAvatar', [GetUserInfoController::class, 'nameAndAvatar']);
    Route::get('/profileInfo', [GetUserInfoController::class, 'profileInfo']);
    Route::get('/profileInfo4Admin/{userId}', [GetUserInfoController::class, 'profileInfo4Admin']);
    Route::get('/saunaInfo/{id}', [GetSaunaInfoController::class, 'get']);
    Route::get('/coordinates/{id}', [GetSaunaInfoController::class, 'map']);
    Route::post('/bookings', [BookSaunaController::class, 'book']);
    Route::delete('/deleteBook/{bookingId}', [BookSaunaController::class, 'remove']);
    Route::get('/bookDateInfo', [GetBookingByDateController::class, 'get']);
    Route::get('/profile/saunas', [GetProfileBookingController::class, 'get']);
    Route::get('/profile/saunas/{userId}', [GetProfileBookingController::class, 'book4Admin']);
    Route::post('/user/update', [UserUpdateController::class, 'update']);
    Route::post('/uploadAvatar', [AvatarUploadController::class, 'upload']);
    Route::post('/saunas/rate', [SaunaRateController::class, 'rate']);
    Route::post('/comments/{saunaId}', [CommentController::class, 'create']);
    Route::get('/comments/get/{saunaId}', [CommentController::class, 'get']);
    Route::get('/saunas/sort', [SortDataController::class, 'sort']);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/userList', [GetUserListController::class, 'get']);
    Route::delete('/user/delete/{userId}', [DeleteUserController::class, 'delete']);
    Route::delete('/deleteSaunaPhoto', [UpdateSaunaDataController::class, 'deletePhoto']);
    Route::put('/user/block/{userId}', [BlockUserController::class, 'block']);
    Route::put('/user/unblock/{userId}', [BlockUserController::class, 'unblock']);
    Route::put('/sauna/update', [UpdateSaunaDataController::class, 'update']);
    Route::post('/uploadSaunaPhoto', [UpdateSaunaDataController::class, 'addPhoto']);
});

Route::post('/login', [UserLoginController::class, 'login']);

Route::post('/registration', [UserRegistrationController::class, 'create']);

Route::get('/saunaList', [SaunaListController::class, 'get']);
