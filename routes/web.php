<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WikiController;

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

Route::get("/", [HomeController::class, 'index']);

Route::get('discord', function () {
    return redirect('https://discord.gg/X8Ju7VhH39');
});
Route::get('shop', function () {
    return redirect('https://shop.endoskull.fr');
});
Route::get('twitter', function () {
    return redirect('https://twitter.com/EndoSkullMC');
});
Route::get("wiki", [WikiController::class, 'home']);

Route::get("wiki/category/{category}", [WikiController::class, 'category']);
Route::get("wiki/page/{page}", [WikiController::class, 'page']);


Route::get("admin", [AdminController::class, 'home'])->name('admin');
Route::get("admin/wiki", [AdminController::class, 'wiki'])->name('wiki-editor');
Route::get("admin/wiki/category/{category}", [AdminController::class, 'wikiCategory'])->name('wiki-category-editor');
Route::get("admin/wiki/createcategory", [AdminController::class, 'wikiCreateCategory'])->name('wiki-category-create-editor');
Route::get("admin/wiki/page/{page}", [AdminController::class, 'wikiPage'])->name('wiki-page-editor');
Route::get("admin/wiki/category/{category}/createpage", [AdminController::class, 'wikiCreatePage'])->name('wiki-page-create-editor');
Route::post("admin/wiki/category/{category}", [AdminController::class, 'updateCategory'])->name('wiki-category-update');
Route::post("admin/wiki/page/{page}/edit", [AdminController::class, 'updatePage'])->name('wiki-page-update');
Route::post("admin/wiki/page/{page}/remove", [AdminController::class, 'removePage'])->name('wiki-page-remove');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
