<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\WikiPageController;

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

/*Route::get('/', function () {
    return view('home');
});*/

Route::get("/", [HomeController::class, 'index']);

Route::get('discord', function () {
    return redirect('https://discord.gg/X8Ju7VhH39');
});
Route::get('twitter', function () {
    return redirect('https://twitter.com/EndoSkullMC');
});
Route::get("wiki", [WikiController::class, 'home']);

Route::get("wiki/{category}", [WikiController::class, 'category']);
Route::get("wiki/{category}/{page}", [WikiController::class, 'page']);
/*
Route::get("salut/{name}", function ($name) {
    return "Salut $name";
});*/
