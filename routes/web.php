<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Brand Story Page
Route::get('/cerita-merk', [PageController::class, 'brandStory'])->name('brand-story');

// Product Catalog & Detail (Rate limited to protect search & database endpoints)
Route::middleware('throttle:60,1')->group(function () {
    Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
    Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.detail');
});

// Quality Page
Route::get('/kualitas', [PageController::class, 'quality'])->name('quality');

// Contact Us Page
Route::get('/hubungi-kami', [PageController::class, 'contactUs'])->name('contact-us');

// Dynamic XML Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
