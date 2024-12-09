<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\BookController;

Route::get('/books/show', [BookController::class, 'show'])->name('books.show');

Route::get('/', [BookController::class, 'index'])->name('books.index'); // Hiển thị danh sách sách
Route::get('/books/create', [BookController::class, 'create'])->name('books.create'); // Hiển thị form tạo sách
Route::post('/books', [BookController::class, 'store'])->name('books.store'); // Lưu sách mới
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit'); // Hiển thị form sửa sách
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update'); // Cập nhật sách
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy'); // Xóa sách
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('add/{book}', [CartController::class, 'add'])->name('cart.add');
    Route::put('update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});
// routes/web.php

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');


Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
