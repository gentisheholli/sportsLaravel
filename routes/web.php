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
    return view('new-home');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/how-it-works', function () {
    return view('how-it-works');
});

Route::get('/sports/soccer', function () {
    return view('sports/soccer');
});

Route::get('/sports/football', function () {
    return view('sports/football');
});

Route::get('/sports/baseball', function () {
    return view('sports/baseball');
});

Route::get('/sports/basketball', function () {
    return view('sports/basketball');
});

Route::get('/sports/tennis', function () {
    return view('sports/tennis');
});

Route::get('/sports/hockey', function () {
    return view('sports/hockey');
});

Route::get('/sports/boxing', function () {
    return view('sports/boxing');
});

Route::get('/sports/table-tennis', function () {
    return view('sports/table-tennis');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
