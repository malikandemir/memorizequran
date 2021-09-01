<?php

use App\Http\Controllers\MemorizedPageController;
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


//Route::get(
//    '(/)',
//    [MemorizedPageController::class, 'index']
//);

Route::get('/', [MemorizedPageController::class, 'index'])->middleware('auth');

Route::post(
    '/memorized',
    [MemorizedPageController::class, 'memorized']
)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\MemorizedPageController::class, 'index'])->name('home');


//Route::get('/vue', view('');
