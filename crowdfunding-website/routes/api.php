<?php

use App\Http\Controllers\Auth\CheckTokenController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegenerateOtpCodeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CampaignController;
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
    Route::post('/logout', LogoutController::class)->middleware('auth:api');
    Route::post('/check-token', CheckTokenController::class)->middleware('auth:api');
});


Route::group([
    'middleware' => ['api', 'verifiedemail', 'auth:api'],
    'prefix' => 'profile'
], function () {
    Route::get('/show', [ProfileController::class, 'show']);
    Route::post('/update', [ProfileController::class, 'update']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'campaign',
], function () {
    Route::get('/random/{count}', [CampaignController::class, 'random']);
    Route::post('/store', [CampaignController::class, 'store']);
    Route::get('/', [CampaignController::class, 'index']);
    Route::get('/{id}', [CampaignController::class, 'detail']);
    Route::get('/search/{keyword}', [CampaignController::class, 'search']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'blog',
], function () {
    Route::get('/random/{count}', [BlogController::class, 'random']);
    Route::post('/store', [BlogController::class, 'store']);
});
