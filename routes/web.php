<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/brand-story', function () {
    return view('brand-story');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

Route::get('/layout', function () {
    return view('layout');
});
