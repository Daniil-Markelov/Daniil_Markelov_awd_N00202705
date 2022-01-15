<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\GameController as AdminGameController;
use App\Http\Controllers\User\GameController as UserGameController;

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

Route::get('login', [LoginController::class, 'login']);

Route::get('about', [AboutController::class, 'about']);


Route::get('/register', function () {
    return view('register');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/user/games/', [UserGameController::class, 'index'])->name('user.games.index');
Route::get('/user/games/{id}', [UserGameController::class, 'show'])->name('user.games.show');


Route::get('/admin/games/', [AdminGameController::class, 'index'])->name('admin.games.index');
Route::get('/admin/games/create', [AdminGameController::class, 'create'])->name('admin.games.create');
Route::get('/admin/games/{id}', [AdminGameController::class, 'show'])->name('admin.games.show');
Route::post('/admin/games/store', [AdminGameController::class, 'store'])->name('admin.games.store');
Route::get('/admin/games/{id}/edit', [AdminGameController::class, 'edit'])->name('admin.games.edit');
Route::put('/admin/games/{id}', [AdminGameController::class, 'update'])->name('admin.games.update');
Route::delete('/admin/games/{id}', [AdminGameController::class, 'destroy'])->name('admin.games.destroy');