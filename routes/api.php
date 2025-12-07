<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClientImageController;
use App\Http\Controllers\ContactNumberController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::post('/admin/signup', [AdminAuthController::class, 'signup']);
Route::post('/admin/login',  [AdminAuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Global Routes (بدون توكن)
|--------------------------------------------------------------------------
*/

// Client Images - Global
Route::get('/client-images',      [ClientImageController::class, 'index']);
Route::get('/client-images/{id}', [ClientImageController::class, 'show']);

// Contact Us - Global
Route::post('/contact-us', [ContactController::class, 'store']);

// Contact Numbers - Global
Route::get('/contact-numbers',      [ContactNumberController::class, 'index']);
Route::get('/contact-numbers/{id}', [ContactNumberController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Admin Routes (محميّة بـ Sanctum)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    // فحص التوكن - يرجع بيانات الأدمِن الحالي
    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    // Client Images - Admin
    Route::post('/client-images',        [ClientImageController::class, 'store']);
    Route::put('/client-images/{id}',    [ClientImageController::class, 'update']);
    Route::delete('/client-images/{id}', [ClientImageController::class, 'destroy']);

    // Contact Us - Admin
    Route::get('/contact-us',            [ContactController::class, 'index']);
    Route::delete('/contact-us/{id}',    [ContactController::class, 'destroy']);

    // Contact Numbers - Admin
    Route::post('/contact-numbers',        [ContactNumberController::class, 'store']);
    Route::put('/contact-numbers/{id}',    [ContactNumberController::class, 'update']);
    Route::delete('/contact-numbers/{id}', [ContactNumberController::class, 'destroy']);
});
