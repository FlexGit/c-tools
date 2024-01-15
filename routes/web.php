<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('page/{alias}', [PageController::class, 'index'])->name('page');
Route::get('section/{alias}', [SectionController::class, 'index'])->name('section');
Route::get('product/{alias}', [ProductController::class, 'index'])->name('product');

Route::get('sitemap.xml', [HomeController::class, 'sitemap']);

Route::fallback(function () {
    abort(404);
});
