<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\FileController;

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

Route::get('/', [PagesController::class, 'index']);
Route::get('/portfolio', [PagesController::class, 'portfolio'])->name('portfolio');
Route::post('/sendMessage', [PagesController::class, 'sendMessage'])->name('sendMessage');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin/')->middleware('auth')->group(function () {

    Route::get('home', function () {
        return view('admin.layouts.dashboard');
    })->name('admin.home');

    Route::resource('projects', ProjectController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('files', FileController::class);
    Route::get('getMessage', [PagesController::class, 'getMessage'])->name('getMessage');
    Route::get('showMessage/{id}', [PagesController::class, 'showMessage'])->name('showMessage');
    Route::delete('deletetMessage/{id}', [PagesController::class, 'deletetMessage'])->name('deletetMessage');

    Route::get('logins', [PagesController::class, 'logins'])->name('logins');
    Route::get('showLogin/{id}', [PagesController::class, 'showLogin'])->name('showLogin');
});

require __DIR__.'/auth.php';
