<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Teacher;
use App\Http\Controllers\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!SS
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Teacher group*/
Route::get('/teacher', [Teacher::class, "TeacherPanel"])->middleware('teacher');

/*Admin group*/
Route::get('/admin', [Admin::class, "redactor"])->middleware('admin', 'auth');
Route::post('/update/{id}', [Admin::class, 'update'])->middleware('auth');
Route::get('/add', [Admin::class, 'add'])->middleware('auth');
Route::post('/addEvent', [Admin::class, 'addEvent'])->middleware('auth');
Route::get('/delete/{id}', [Admin::class, 'delete'])->middleware('auth', 'admin');
Route::get('/download/{id}', [Admin::class, 'download'])->middleware('auth');

/*User group*/
Route::get('/user', [User::class, "UserPanel"]);

/*Code group*/
Route::get('/error', [Admin::class, "error"]);
