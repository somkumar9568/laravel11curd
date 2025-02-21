<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'loadAllUsers']);

Route::get('/add/users', [UserController::class, 'loadAddUsers']);
Route::post('/add/users', [UserController::class, 'AddUser'])->name('AddUser');




//session


Route::get('/login', [SessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [SessionController::class, 'login']);
Route::get('/welcome', [SessionController::class, 'welcome'])->middleware('auth.session');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');