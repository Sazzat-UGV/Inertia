<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/login',[LoginController::class,'create'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::middleware('auth')->group(function(){

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
    $can = Auth::user()->email=='admin@gmail.com'?true:false;
    return Inertia::render('Users/Index', compact('users', 'search','can'));
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
   Auth::logout();
   return redirect('/login');
});

});
