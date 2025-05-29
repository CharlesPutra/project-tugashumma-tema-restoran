<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
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
Route::get('/', [AuthController::class, 'Showlogin'])->name('Showlogin');
Route::get('/regis', [AuthController::class, 'Showregis'])->name('Showregis');

//route validate auth
Route::post('/regis', [AuthController::class, 'register'])->name('register');
Route::post('/', [AuthController::class, 'login'])->name('login');


//route middleware 
Route::middleware('auth')->group(function () {

    //route home
    Route::get('/home', [HomeController::class, 'home'])->name('home');


    //route category
    Route::resource('/category', CategoryController::class);

    Route::resource('/menu', MenuController::class);

    Route::resource('/customers', CustomersController::class);
    Route::post('/customers/{id}/call', [CustomersController::class, 'call'])->name('customers.call');


    //route logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
