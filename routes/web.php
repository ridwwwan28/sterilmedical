<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/cerita-merk', function () {
    return view('brand-story');
});

Route::get('/produk', function () {
    $products = config('products');
    return view('products', compact('products'));
});

Route::get('/produk/{slug}', function ($slug) {
    $products = config('products');
    $product = collect($products)->firstWhere('slug', $slug);
    if (!$product) {
        abort(404);
    }
    $relatedProducts = collect($products)->where('slug', '!=', $slug)->shuffle()->take(3);
    return view('product-detail', compact('product', 'relatedProducts'));
})->name('products.detail');

Route::get('/kualitas', function () {
    return view('quality');
});

Route::get('/hubungi-kami', function () {
    return view('contact-us');
});

Route::get('/layout', function () {
    return view('layout');
});
