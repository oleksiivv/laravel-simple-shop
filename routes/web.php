<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', function(){
    return view('welcome');
})->name('index');

Route::prefix('info')->group(function(){
    Route::get('/about', [InfoController::class, 'about'])->name('about');
    Route::get('/delivery', [InfoController::class, 'delivery'])->name('delivery');
    Route::get('/contacts', [InfoController::class, 'contacts'])->name('contacts');
});


Route::prefix('shop')->group(function(){
    Route::get('/', [ShopController::class, 'home'])->name('shop');
    Route::get('/{id}', [ShopController::class, 'singleItem'])->whereNumber('id')->name('singleItem');
});

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminPanelController::class, 'main'])->name('admin-panel')->middleware('auth:admin');
    Route::post('/add-new-product', [AdminPanelController::class, 'addNewProduct'])->name('add-new-product')->middleware('auth:admin');
});

Auth::routes();
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm']);
Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
