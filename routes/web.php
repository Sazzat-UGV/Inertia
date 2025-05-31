<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('Home');
});
Route::get('/users', function () {
    $users=Inertia::defer(function(){
        return User::select('id','name','email')->paginate();
    });
    return Inertia::render('Users',compact('users'));
});
Route::get('/settings', function () {
    return Inertia::render('Settings');
});
Route::post('/logout', function () {
    dd(request('name'));
});
