<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\InfoController;
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
