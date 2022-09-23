<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\Authenticated;
use App\Http\Middleware\Visitor;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(Authenticated::class)->group(function(){
    Route::get('/logout', [UserController::class, 'logout']);
    Route::resource('/students', StudentController::class);
});

Route::middleware(Visitor::class)->group(function(){
    Route::get('/', function () { return redirect('/login'); });
    Route::get('/login', [UserController::class, 'loginForm']);
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/register', [UserController::class, 'form']);
    Route::post('/register', [UserController::class, 'register']);
});



