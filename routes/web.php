<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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
    return view('index');
});

Route::get('/login', [AuthController::class, 'loginPage'])->name('login')->middleware('guest');
Route::post('/loginAuth', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/register', [UserController::class, 'registerPage'])->middleware('guest');
Route::post('/registerUser', [UserController::class, 'registerUser']);

Route::get('/profile/{username}', [UserController::class, 'viewProfile'])->middleware('auth');
Route::get('/editProfile/{username}', [UserController::class, 'editProfilePage'])->middleware('auth');

Route::post('/updateProfile/{id}', [UserController::class, 'updateProfile']);
Route::get('/editPassword/{username}', [UserController::class, 'editPasswordPage'])->middleware('member');
Route::post('/updatePassword/{id}', [UserController::class, 'updatePassword'])->middleware('member');
Route::get('/remove_from_cart/{id}', [ItemController::class, 'removeFromCart'])->middleware('member');

Route::get('/cart/{username}', [CartController::class, 'cart'])->middleware('member');
Route::get('/history/{username}', [TransactionController::class, 'transactionPage'])->middleware('member');
Route::get('/checkOut', [TransactionController::class, 'addTransaction'])->middleware('member');

Route::get('/home', [ItemController::class, 'getAllItems'])->middleware('auth');
Route::get('/search', [ItemController::class, 'search'])->middleware('auth');
Route::get('/item_detail/{name}', [ItemController::class, 'detailItems'])->middleware('auth');
Route::post('/ToCart/{id}', [ItemController::class, 'addItemToCart']);
Route::get('/edit_cart_page/{id}', [ItemController::class, 'editCartPage'])->middleware('member');
Route::post('/edit_cart/{id}', [ItemController::class, 'editCart']);

Route::get('/add_item', [ItemController::class, 'addItemPage'])->middleware('admin');
Route::post('/addItem', [ItemController::class, 'addItem']);
Route::get('/delete_item/{id}', [ItemController::class, 'deleteItem'])->middleware('admin');
