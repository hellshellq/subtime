e<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Маршруты аутентификации (используем встроенные маршруты Laravel)
require __DIR__.'/auth.php';

// Маршруты для подписок
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/subscriptions', [ProfileController::class, 'subscriptions'])->name('profile.subscriptions');
    Route::get('/profile/balance', [ProfileController::class, 'balance'])->name('profile.balance');
    Route::post('/profile/balance/add', [ProfileController::class, 'addBalance'])->name('profile.balance.add');
    
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/{subscription}', [SubscriptionController::class, 'show'])->name('subscriptions.show');
    Route::post('/subscriptions/{subscription}/purchase', [SubscriptionController::class, 'purchase'])->name('subscriptions.purchase');

    // Маршруты для транзакций
    Route::get('/profile/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/profile/deposit', [TransactionController::class, 'deposit'])->name('transactions.deposit');
});
