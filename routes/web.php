<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\RentalController;
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

Route::middleware('autenticate:padrao')->prefix('/app')->group(function () {
    // Define routes for the 'author' resource
    Route::resource('/author', AuthorController::class);

    // Define routes for the 'book' resource
    Route::resource('/book', BookController::class);

    // Define routes for the 'customer' resource
    Route::resource('/customer', CustomerController::class);

    // Define routes for the 'employee' resource
    Route::resource('/employee', EmployeeController::class);

    // Define routes for the 'publisher' resource
    Route::resource('/publisher', PublisherController::class);

    // Define routes for the 'rental' resource
    Route::resource('/rental', RentalController::class);
    
    // Define a route for the 'menu' endpoint
    Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'index'])->name('site.menu');

    // Define a route for the 'logout' endpoint
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('site.logout');
    
    // Define a route for the 'home' endpoint
    Route::get('/home', [\App\Http\Controllers\HomePageController::class, 'index'])->name('site.home');
});


Route::get('/login/{erro?},{sucess?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('site.login');


Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('site.register');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'create'])->name('site.register');