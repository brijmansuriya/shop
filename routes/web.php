<?php

use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\expenseController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\VendorsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
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

Route::get('/',  [HomeController::class, 'index'])->middleware(['auth']);
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

Route::group(['prefix' => 'admin/agent'], function () {
    Route::get('/', [AgentController::class, 'index']);
    Route::get('/add', [AgentController::class, 'add']);
    Route::get('/add/{id}', [AgentController::class, 'add']);
    Route::post('/save', [AgentController::class, 'save']);
    Route::get('/delete/{id}', [AgentController::class, 'delete']);
});

Route::group(['prefix' => 'admin/customer'], function () {
    Route::get('/', [CustomerController::class, 'index']);
    Route::get('/add', [CustomerController::class, 'add']);
    Route::get('/add/{id}', [CustomerController::class, 'add']);
    Route::post('/save', [CustomerController::class, 'save']);
    Route::get('/delete/{id}', [CustomerController::class, 'delete']);
});
Route::group(['prefix' => 'admin/vendors'], function () {
    Route::get('/', [VendorsController::class, 'index']);
    Route::get('/add', [VendorsController::class, 'add']);
    Route::get('/add/{id}', [VendorsController::class, 'add']);
    Route::post('/save', [VendorsController::class, 'save']);
    Route::get('/delete/{id}', [VendorsController::class, 'delete']);
});

Route::group(['prefix' => 'admin/product'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/add', [ProductController::class, 'add']);
    Route::get('/add/{id}', [ProductController::class, 'add']);
    Route::post('/save', [ProductController::class, 'save']);
    Route::get('/delete/{id}', [ProductController::class, 'delete']);
});


//Aditional add on

Route::get('mi00', function () {
    Artisan::call('migrate');
    return 'Database migration success.';
});
