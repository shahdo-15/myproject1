<?php
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


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// صفحات التسجيل وتسجيل الدخول
Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'showLogin']);
Route::post('/login', [UserController::class, 'login']);


Route::get('/welcome', [UserController::class, 'welcome']);

// تسجيل الخروج
Route::get('/logout', [UserController::class, 'logout']);