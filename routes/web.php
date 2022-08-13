<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
// use App\Http\Controllers\StockController;
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

Route::get('/', function () {
    return view('auth/login');
});

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Item
Route::middleware(['auth'])->group(
    function () {
        Route::name('dashboard.')
            ->prefix('dashboard')
            ->group(
                function () {
                    Route::get('', [DashboardController::class, 'index'])->name('index');
                }
            );
    }
);


// Item
Route::middleware(['auth', 'verified'])->group(
    function () {
        Route::name('items.')
            ->prefix('items')
            ->group(
                function () {
                    Route::get('/', [ItemController::class, 'index'])->name('index');
                    Route::get('/create', [ItemController::class, 'create'])->name('create');
                    Route::post('/store', [ItemController::class, 'store'])->name('store');
                    Route::post('/stock', [ItemController::class, 'stock'])->name('stock');
                    Route::get('/edit/{id}', [ItemController::class, 'edit'])->name('edit');
                    Route::post('/update/{id}', [ItemController::class, 'update'])->name('update');
                    Route::delete('/destroy/{id}/delete', [ItemController::class, 'destroy'])->name('destroy');
                }
            );
    }
);

// Orders
Route::middleware(['auth', 'verified'])->group(
    function () {
        Route::name('orders.')
            ->prefix('orders')
            ->group(
                function () {
                    Route::get('/', [OrderController::class, 'index'])->name('index');
                    Route::get('/requests', [OrderController::class, 'requests'])->name('requests');
                    Route::get('/create', [OrderController::class, 'create'])->name('create');
                    Route::post('/store', [OrderController::class, 'store'])->name('store');
                    Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
                    Route::post('/authorise/{id}', [OrderController::class, 'authorise'])->name('authorise');
                    Route::post('/approve/{id}', [OrderController::class, 'approve'])->name('approve');
                    Route::delete('/destroy/{id}/delete', [OrderController::class, 'destroy'])->name('destroy');
                }
            );
    }
);

// Requests
Route::middleware(['auth', 'verified'])->group(
    function () {
        Route::name('requests.')
            ->prefix('requests')
            ->group(
                function () {
                    Route::get('/', [OrderController::class, 'requests'])->name('index');
                }
            );
    }
);

require __DIR__ . '/auth.php';

// Stock
// Route::middleware(['auth', 'verified'])->group(
//     function () {
//         Route::name('stock.')
//             ->prefix('stock')
//             ->group(
//                 function () {
//                     Route::get('/', [StockController::class, 'index'])->name('index');
//                     Route::get('/create', [StockController::class, 'create'])->name('create');
//                     Route::post('/store', [StockController::class, 'store'])->name('store');
//                     Route::get('/edit/{id}', [StockController::class, 'edit'])->name('edit');
//                     Route::post('/update/{id}', [StockController::class, 'update'])->name('update');
//                     Route::delete('/destroy/{id}/delete', [StockController::class, 'destroy'])->name('destroy');
//                 }
//             );
//     }
// );