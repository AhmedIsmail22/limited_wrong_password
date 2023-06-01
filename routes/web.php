<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::get('/login', [UserController::class, "loginForm"])->name("loginForm");
Route::post('/login', [UserController::class, "login"])->name("login");
Route::get('/test', [UserController::class, "test"])->name("test");


Route::middleware("auth")->group(function(){
    Route::get("dashboard", [UserController::class, "dashboard"])->name("dashboard");
    Route::get("logout", [UserController::class, "logout"])->name("logout");
});