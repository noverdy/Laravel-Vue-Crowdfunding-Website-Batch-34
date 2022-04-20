<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/route-1', function () {
    return view('route', ['message' => 'Anda bisa mengakses laman ini karena telah melakukan verifikasi Email']);
})->middleware('verifiedemail');

Route::get('/route-2', function () {
    return view('route', ['message' => 'Anda bisa mengakses laman ini karena Anda adalah Admin dan telah melakukan verifikasi Email']);
})->middleware(['admin', 'verifiedemail']);
