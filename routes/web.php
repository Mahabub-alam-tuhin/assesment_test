<?php

use App\Http\Controllers\frontEndController;
use App\Http\Controllers\itemController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [frontEndController::class, 'home'])->name('frontend.home.home');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function () {
    Route::get('/add_item', [itemController::class, 'add_item'])->name('admin.item.add_item');
    Route::post('/store', [itemController::class, 'store'])->name('admin.item.store');
    Route::get('/show', [itemController::class, 'show'])->name('admin.item.view_all_item');
    Route::get('/edit/{id}', [itemController::class, 'edit'])->name('admin.item.edit');
    Route::post('/update/{id}', [itemController::class, 'update'])->name('admin.item.update');
    Route::post('/delete/{id}', [itemController::class, 'delete'])->name('admin.item.delete');
    // Route::get('/search', [frontEndBookingController::class, 'search'])->name('frontEnd.Booking.search');

});