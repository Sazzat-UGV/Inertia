<?php

use App\Models\User;
use Illuminate\Http\Request;
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
        ->paginate(10)->withQueryString();
    $search = $request->search;
    return Inertia::render('Users', compact('users', 'search'));
});
Route::get('/settings', function () {
    return Inertia::render('Settings');
});
Route::post('/logout', function () {
    dd(request('name'));
});
