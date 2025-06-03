<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['reset'=>true]);

Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('InvenCrown');

// CRUD routes for Product
Route::resource('products', ProductController::class);


Route::post('/products/{product}/reduce-stock', [ProductController::class, 'reduceStock'])->name('products.reduceStock');
Route::post('/products/{product}/increase-stock', [ProductController::class, 'plusStock'])->name('products.plusStock');


// Custom route for PDF generation
Route::get('/products/generate-pdf', [ProductController::class, 'show'])->name('products.generatePdf');