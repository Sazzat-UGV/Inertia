<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});
Route::get('/users', function () {
    $time=now()->toTimeString();
    return Inertia::render('Users',compact('time'));
});
Route::get('/settings', function () {
    return Inertia::render('Settings');
});
Route::post('/logout', function () {
   dd(request('name'));
});
