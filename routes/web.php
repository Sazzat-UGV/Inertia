<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $name="Home Page";
    $frameworks=[
'Laravel',
'Vue',
'Inertia'
    ];
    return Inertia::render('Home',compact('name','frameworks'));
});
