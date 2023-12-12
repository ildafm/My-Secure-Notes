<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyBooksController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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
    return view('master.welcome');
});

// Route::get('/x', function () {
//     return view('x');
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('notes', NotesController::class);
    Route::resource('my-books', MyBooksController::class);
    Route::resource('users', UserController::class);
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/edit/{user_id}/{edit_mode}', [ProfileController::class, 'update'])->name('profile_edit');
});



require __DIR__ . '/auth.php';
