<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSettingsController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/categories', [CategoryController::class,'index'])->name('categories');
Route::get('/details/{id}', [DetailController::class,'index'])->name('detail');
Route::get('/cart', [CartController::class,'index'])->name('cart');
Route::get('/success', [CartController::class,'success'])->name('success');
Route::get('/register/success', [RegisterController::class,'success'])->name('register.success');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('/dashboard/products', [DashboardProductController::class,'index'])->name('dashboard.products');
Route::get('/dashboard/products/create', [DashboardProductController::class,'create'])->name('dashboard.products.create');
Route::get('/dashboard/products/{id}', [DashboardProductController::class,'detail'])->name('dashboard.products.details');

Route::get('/dashboard/transaction', [DashboardTransactionController::class,'index'])->name('dashboard.transaction');
Route::get('/dashboard/transaction/{id}', [DashboardTransactionController::class,'details'])->name('dashboard.transaction.details');

Route::get('/dashboard/settings', [DashboardSettingsController::class,'index'])->name('dashboard.settings');
Route::get('/dashboard/accounts', [DashboardSettingsController::class,'account'])->name('dashboard.accounts');

    
// ->middleware(['auth','admin'])

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');

    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin-dashboard-category');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('admin-dashboard-category.create');
    Route::post('/categories/store', [AdminCategoryController::class, 'store'])->name('admin-dashboard-category.store');
    Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin-dashboard-category.edit');
    Route::put('/categories/{id}/update', [AdminCategoryController::class, 'update'])->name('admin-dashboard-category.update');
    Route::delete('/categories/{id}/delete', [AdminCategoryController::class, 'destroy'])->name('admin-dashboard-category.delete');

});
Auth::routes();

