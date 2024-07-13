<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\TaskController;
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
    return view('welcome');
});
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/show', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/delete/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/login', [TaskController::class, 'login'])->name('login');


Route::get('/login', [TaskController::class, 'login'])->name('login');
Route::get('/logout', [TaskController::class, 'logout'])->name('logout');

Route::get('/register', [TaskController::class, 'register'])->name('register');
Route::post('/registerUser', [TaskController::class, 'registerUser'])->name('registerUser');
Route::post('/loginUser', [TaskController::class, 'loginUser'])->name('loginUser');



Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');



/***************************** ADMIN ROUTES***************************** */

Route::get('/adminIndex', [AdminController::class, 'adminIndex'])->name('adminIndex');
Route::get('/adminProfile', [AdminController::class, 'adminProfile'])->name('adminProfile');
Route::get('/ourCustomers', [AdminController::class, 'ourCustomers'])->name('ourCustomers');
Route::get('/ourTask', [AdminController::class, 'ourTask'])->name('ourTask');
Route::get('/changeUserStatus/{status}/{id}', [AdminController::class, 'changeUserStatus'])->name('changeUserStatus');
Route::get('/changeTaskStatus/{status}/{id}', [AdminController::class, 'changeTaskStatus'])->name('changeTaskStatus');


Route::post('/updateUser', [TaskController::class, 'updateUser'])->name('updateUser');
