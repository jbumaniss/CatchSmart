<?php

use App\Http\Controllers\ManagementController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WarehouseController::class, 'index'])->name("warehouse.index");

Route::resource('partners', PartnerController::class);
Route::resource('types', TypeController::class);
Route::resource('products', ProductController::class);

Route::get('/orders', [OrderController::class, 'index'])->name("orders.index");
Route::put('/orders/{partner}/{product}', [OrderController::class, 'sold'])->name("orders.sold");

Route::get('/manage', [ManagementController::class, 'index'])->name("manage.index");
Route::get('/manage/partners', [ManagementController::class, 'partners'])->name("manage.partners");
Route::get('/manage/types', [ManagementController::class, 'types'])->name("manage.types");
Route::get('/manage/products', [ManagementController::class, 'products'])->name("manage.products");

