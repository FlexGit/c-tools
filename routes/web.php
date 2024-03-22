<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsController;
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
Route::get('contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('catalog/{sectionAlias?}/{subSectionAlias?}/{productAlias?}', [CatalogController::class, 'index'])->name('catalog');
Route::get('services/{alias?}', [ServiceController::class, 'index'])->name('services');
Route::get('news/{alias?}', [NewsController::class, 'index'])->name('news');

Route::get('sitemap.xml', [HomeController::class, 'sitemap']);

Route::fallback(function () {
    abort(404);
});
