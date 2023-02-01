<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;  
use App\Http\Controllers\CustomerController;    
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemResourceController;
use App\Http\Controllers\SaleController;

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

// Route::get('/', function () {
//     return view('login.index', [
//     ]);
// });
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/items', [ItemController::class, 'index'])->middleware('auth');
Route::get('/item/{item:item_cd}', [ItemController::class, 'show']);
Route::get('/item', [ItemController::class, 'show']);
Route::post('/item', [ItemController::class, 'store']);
Route::resource('/resource/item', ItemResourceController::class)->middleware('auth');

Route::get('/customers', [CustomerController::class, 'index'])->middleware('auth');;

// Route::get('/sales', function () {
//     return view('sales', [
//         "title" => "Sales Order",
//         "base" => "sales",
        
//     ]);
// })->middleware('auth');
Route::get('/sales', [SaleController::class, 'index'])->middleware('auth');
Route::get('/sale', [SaleController::class, 'show'])->middleware('auth');
Route::post('/sale', [SaleController::class, 'store'])->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);