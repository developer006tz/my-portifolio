<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\Project;
use \App\Http\Controllers\ProjectType;

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

Route::get('/', function () {
    return view('home');
});

Route::post('/contact/submit', [\App\Http\Controllers\ContactController::class, 'submit']);

// Registration route
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeUser'])->name('register.store');

// Login route
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.store');

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

// Admin routes
Route::group(['middleware' => ['auth']], function () {
    Route::resource('projects', Project::class);
    Route::delete('projects/{project}/delete-project', [Project::class, 'delete_project'])->name('projects.delete-project');
    Route::resource('project-types', ProjectType::class);
    Route::resource('users', \App\Http\Controllers\AuthController::class);
});

Route::post('/submit-message', [MessageController::class, 'submit'])->name('message.submit');

