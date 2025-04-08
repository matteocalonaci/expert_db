<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use Database\Seeders\OrderDetailSeeder;

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
});

Route::middleware(['auth'])
    ->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
    ->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
    ->group(function () {

        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            // Rotte per le categorie
    Route::resource('categories', CategoryController::class);

      // Rotte per le sottocategorie
    Route::resource('subcategories', SubcategoryController::class);

    // Rotte per i prodotti
    Route::resource('products', ProductController::class);

    // Rotte per gli ordini
    Route::resource('orders', OrderController::class);

    // Rotte per i dettagli degli ordini
    Route::resource('order_detail', OrderDetailsController::class);
    });

require __DIR__ . '/auth.php';
