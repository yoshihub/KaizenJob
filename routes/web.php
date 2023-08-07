<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return view('welcome');
});

ROute::get('/hello', function () {
    return Inertia::render('Hello');
});
