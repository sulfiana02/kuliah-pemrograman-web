<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/produk', function () {
    return view('produk');
});

Route::get('/tentang', function () {
    return view('tentang');
});


