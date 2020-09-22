<?php

use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Token
Route::post('/token', [TokenController::class, 'store'])->name('tokens.store');

// Starred Repos
Route::post('/starred-repos', [RepositoryController::class, 'fetch'])->name('starred-repos');
