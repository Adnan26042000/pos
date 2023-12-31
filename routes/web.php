<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::name('master-data.')->prefix('master-data')->group(function () {
        Route::get('/manufacturer', function () {
            return view('master-data.manufacturer.add-manufacturer');
        })->name('manufacturer');

        Route::get('/category', function () {
            return view('master-data.categories.add-categories');
        })->name('category');

        Route::get('/rack', function () {
            return view('master-data.rack.add-rack');
        })->name('rack');

        Route::get('/sizes', function () {
            return view('master-data.sizes.add-sizes');
        })->name('sizes');

        Route::get('/products', function () {
            return view('master-data.products.product-lists');
        })->name('products');
        Route::get('/add-products', function () {
            return view('master-data.products.add-products');
        })->name('add-products');
        Route::get('/edit-products/{id}', function () {
            return view('master-data.products.edit-products');
        })->name('edit-products');

    });


    Route::name('supplier.')->prefix('supplier')->group(function () {
        Route::get('/add-supplier/{supplier_id?}', function () {
            return view('supplier.add-supplier');
        })->name('add-supplier');

        Route::get('/suppliers-list', function () {
            return view('supplier.suppliers-list');
        })->name('suppliers-list');
    });

    Route::name('customer.')->prefix('customer')->group(function () {
        Route::get('/add-customer/{customer_id?}', function () {
            return view('customer.add-customer');
        })->name('add-customer');


        Route::get('/customers-list', function () {
            return view('customer.customers-list');
        })->name('customers-list');
    });

    Route::name('purchase.')->prefix('customer')->group(function () {
        Route::get('/create-purchase-order', function () {
            return view('purchase.purchase-order');
        })->name('create-purchase-order');
    });

});

require __DIR__ . '/auth.php';
