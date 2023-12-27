<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SeoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/checkAuth',function(){
        return Response()->json([
            'status'    => 200,
            'user'      => true
        ]);
    });

    Route::prefix('category')->group(function(){
        Route::name('category.')->group(function(){
            Route::post('/add',[CategoryController::class, 'add'])->name('add');
        });
    });

    Route::prefix('seo')->group(function(){
        Route::name('seo.')->group(function(){
            Route::get('/save',[SeoController::class, 'save'])->name('save');
        });
    });
});

Route::post('/registration',[AdminController::class, 'registration'])->name('registration');
Route::post('/userLogin',[AdminController::class, 'userLogin'])->name('userLogin');