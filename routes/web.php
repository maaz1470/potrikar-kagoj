<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('backend.backend');
});
Route::get('/auth/register',function(){
    return view('backend.backend');
});

Route::get('/auth/login',function(){
    return view('backend.backend');
});

Route::prefix('category')->group(function(){
    Route::get('/',function(){
        return view('backend.backend');
    });
    Route::get('/add',function(){
        return view('backend.backend');
    });
});