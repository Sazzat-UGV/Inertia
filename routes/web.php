<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('Home');
});
Route::get('/users', function (Request $request) {
    $users=Inertia::defer(function() use($request){
        return User::where('name','LIKE','%'.$request->search."%")->orWhere('email','LIKE','%',$request->search.'%')->select('id','name','email')->paginate();
    });
    return Inertia::render('Users',compact('users'));
});
Route::get('/settings', function () {
    return Inertia::render('Settings');
});
Route::post('/logout', function () {
    dd(request('name'));
});
