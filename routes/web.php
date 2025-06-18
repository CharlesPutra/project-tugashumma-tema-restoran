<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\TableController;
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


// Route::get('/', function () {
//     return view('welcome');
// });

//route view auth
Route::middleware('guest')->group(function () {

    Route::get('/', [AuthController::class, 'Showlogin'])->name('Showlogin');
    Route::get('/regis', [AuthController::class, 'Showregis'])->name('Showregis');
    
    //route validate auth
    Route::post('/regis', [AuthController::class, 'register'])->name('register');
    Route::post('/', [AuthController::class, 'login'])->name('login');
});


//route middleware 
Route::middleware('auth')->group(function () {

    //route home
    Route::get('/home', [HomeController::class, 'home'])->name('home');


    //route category
    Route::resource('/category', CategoryController::class);

    Route::resource('/menu', MenuController::class);

    Route::resource('/customers', CustomersController::class);
    Route::post('/customers/{id}/call', [CustomersController::class, 'call'])->name('customers.call');

    //route orders table 
    Route::resource('/tables', TableController::class);

    //route order
    Route::get('/orders/create', [OrdersController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::patch('/orders/{id}/status', [OrdersController::class, 'updateStatus'])->name('orders.updateStatus');



    //route logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
