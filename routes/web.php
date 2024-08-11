<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('me', [AuthController::class, 'me']);

    Route::apiResource('hotels', HotelController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('guests', GuestController::class);
    Route::apiResource('apartments', ApartmentController::class);
    Route::apiResource('bookings', BookingController::class);
});
