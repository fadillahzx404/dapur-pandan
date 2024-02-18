<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\TransactionsController;

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\ProductsAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\BannersAdminController;
use App\Http\Controllers\Admin\PaymentMethodsAdminController;
use App\Http\Controllers\Admin\TransactionsAdminController;
use App\Http\Controllers\Admin\UsersAdminController;

//Cashier

use App\Http\Controllers\Cashier\DashboardCashierController;
use App\Http\Controllers\Cashier\TransactionsCashierController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/all_products', [ProductsController::class, 'index'])->name('all_products');
Route::get('/detail_product/{id}', [ProductsController::class, 'detail'])->name('detail_product');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/carts/{id}', [CartsController::class, 'index'])->name('carts');
    Route::post('/add_to_carts', [CartsController::class, 'store'])->name('carts-store');
    Route::post('/update_quantity/{id}', [CartsController::class, 'update_quantity'])->name('update-quantity');
    Route::get('/destroy_cart_item/{id}', [CartsController::class, 'destroy_cart_item'])->name('destroy-cart-item');
    Route::post('/make_payment', [TransactionsController::class, 'store'])->name('make-payment');
    Route::get('/transaction_payment/{id}', [TransactionsController::class, 'showPayment'])->name('transaction-payments');
    Route::post('/upload_confirm_payment/{id}', [TransactionsController::class, 'uploadConfirm'])->name('upload-confirm-payment');
    Route::get('/thanks_confirm', [TransactionsController::class, 'thanksConfirm'])->name('thanks-confirm');
    Route::get('/transactions_history/{id}', [TransactionsController::class, 'transactionHistory'])->name('transactions-history');
    Route::get('/transactions_history_details/{id}', [TransactionsController::class, 'transactionHistoryDetails'])->name('transactions-history-details');
    Route::post('/transaction_update_expired/{id}', [TransactionsController::class, 'uploadConfirm'])->name('transaction-update-expired');
});

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardAdminController::class, 'index'])->name('dashboard-admin');
        Route::resource('products', ProductsAdminController::class);
        Route::resource('category', CategoryAdminController::class);
        Route::resource('banners', BannersAdminController::class);
        Route::resource('payment-methods', PaymentMethodsAdminController::class);
        Route::resource('transactions', TransactionsAdminController::class);
        Route::resource('users-admin', UsersAdminController::class);
    });

Route::prefix('cashier')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardCashierController::class, 'index'])->name('dashboard-cashier');
        Route::resource('transactions-cashier', TransactionsCashierController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
