<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('admin');
});

Route::get('/login', function () {
    return redirect('admin');
})->name('login');
