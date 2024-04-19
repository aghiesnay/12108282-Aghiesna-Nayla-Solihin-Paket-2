<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CustomerController;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;


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
Route::middleware('isGuest')->group(function() {
    Route::get('/login', [Controller::class, 'login'])->name('login');
});

Route::middleware('isLogin', 'cekRole:admin')->group(function() {
    Route::get('/user', [Controller::class, 'user'])->name('user');
    Route::post('/create-user', [Controller::class, 'createUser'])->name('createUser');
    Route::get('/data-user', [Controller::class, 'dataUser'])->name('dataUser');
    Route::get('/edit-user/{id}', [Controller::class, 'editUser'])->name('editUser');
    Route::patch('/update-user/{id}', [Controller::class, 'updateUser'])->name('updateUser');
    Route::post('/delete-user/{id}', [Controller::class, 'deleteUser'])->name('deleteUser');

    
    Route::post('/create-product', [ProductController::class, 'createProduct'])->name('createProduct');
    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('editProduct');
    Route::patch('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::post('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

    Route::post('/delete-sale/{id}', [SaleController::class, 'deleteSale'])->name('deleteSale');

});

Route::middleware('isLogin', 'cekRole:employee')->group(function() {
    Route::get('/sale', [SaleController::class, 'sale'])->name('sale');
    Route::get('/index', [SaleController::class, 'index'])->name('index');
    Route::post('/add-to-cart', [SaleController::class, 'addToCart'])->name('addToCart');
    Route::get('/order', [SaleController::class, 'order'])->name('order');
    Route::post('/create-order', [SaleController::class, 'createOrder'])->name('createOrder');

    Route::get('/data-customer', [CustomerController::class, 'customer'])->name('customer');
});

Route::middleware('isLogin', 'cekRole:admin,employee')->group(function() {
    Route::get('/product', [ProductController::class, 'product'])->name('product');
    Route::get('/data-sales', [SaleController::class, 'dataSales'])->name('dataSales');
    Route::get('/detail-sale/{id}/pdf', [SaleController::class, 'detailSalePDF'])->name('detailSale.pdf');
});

Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard/auth', [Controller::class, 'auth'])->name('auth');
Route::get('/logout', [Controller::class, 'logout'])->name('logout');
Route::get('/error', [Controller::class, 'error'])->name('error');


