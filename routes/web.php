<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\expenseController;
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

Route::view('/','welcome')->middleware(['auth']);
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/clr', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
});



Route::group(['prefix' => 'admin/settings'], function () {
    Route::get('/', [SettingsController::class, 'index']);
    Route::get('/add', [SettingsController::class, 'add']);
    Route::get('/add/{id}', [SettingsController::class, 'add']);
    Route::post('/save', [SettingsController::class, 'save']);
    Route::get('/delete/{id}', [SettingsController::class, 'delete']);
});

Route::group(['prefix' => 'admin/category'], function () {
    Route::get('/', [categoryController::class, 'index']);
    Route::get('/add', [categoryController::class, 'add']);
    Route::get('/add/{id}', [categoryController::class, 'add']);
    Route::post('/save', [categoryController::class, 'save']);
    Route::get('/delete/{id}', [categoryController::class, 'delete']);
});
Route::group(['prefix' => 'admin/expense'], function () {
    Route::get('/', [expenseController::class, 'index']);
    Route::get('/add', [expenseController::class, 'add']);
    Route::get('/add/{id}', [expenseController::class, 'add']);
    Route::post('/save', [expenseController::class, 'save']);
    Route::get('/delete/{id}', [expenseController::class, 'delete']);
});