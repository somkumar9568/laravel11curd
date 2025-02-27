<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'loadAllUsers']);

Route::get('/add/users', [UserController::class, 'loadAddUsers']);
Route::post('/add/users', [UserController::class, 'AddUser'])->name('AddUser');


Route::get('/edit/{id}', [UserController::class, 'loadEditform'])->name('EditUserForm');
Route::post('/edit/user', [UserController::class, 'EditUser'])->name('EditUser');

Route::get('/delete/{id}', [UserController::class, 'deleteUser']);




//session

Route::get('/login', [SessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [SessionController::class, 'login']);
Route::get('/welcome', [SessionController::class, 'welcome'])->middleware('auth.session');
Route::post('/update-profile', [SessionController::class, 'updateProfile'])->name('updateProfile');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');