<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers\Auth'
], function () {
    Route::post('/register', RegisterController::class);
    Route::post('/regenerate-otp', RegenerateOtpCodeController::class);
    Route::post('/verification', VerificationController::class);
    Route::post('/update-password', UpdatePasswordController::class);
    Route::post('/login', LoginController::class);
});


Route::group([
    'middleware' => ['api', 'verifiedemail', 'auth:api'],
    'prefix' => 'profile'
], function () {
    Route::get('/show', [ProfileController::class, 'show']);
    Route::post('/update', [ProfileController::class, 'update']);
});
