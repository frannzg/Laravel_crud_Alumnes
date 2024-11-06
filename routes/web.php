<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnsenyamentController;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\CentreController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('ensenyament', EnsenyamentController::class);
Route::resource('alumne', AlumneController::class);
Route::resource('centre', CentreController::class);
