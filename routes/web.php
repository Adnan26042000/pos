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


});

require __DIR__ . '/auth.php';
