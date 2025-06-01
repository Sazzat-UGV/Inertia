<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});
Route::get('/users', function (Request $request) {
    $search = $request->input('search');
    $users  = User::query()
        ->when($search, function ($query, $search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        })
        ->select('id', 'name', 'email')
        ->latest('id')
        ->paginate(10)->withQueryString();
    $search = $request->search;
    return Inertia::render('Users/Index', compact('users', 'search'));
});
Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
});
Route::post('/users/create', function (Request $request) {
    $request->validate([
        'name'=>'required|string|max:255',
        'email'=>'required|email|max:255',
        'password'=>'required|string|min:6',
    ]);
    User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
    ]);
    return redirect('/users');
});
Route::get('/settings', function () {
    return Inertia::render('Settings');
});
Route::post('/logout', function () {
    dd(request('name'));
});
