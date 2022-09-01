<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AccountController;

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
//     return view('welcome');
// });

Route::prefix('backend')
    ->namespace('\App\Http\Controllers\Backend')
    ->middleware([
        // '',
    ])->group(function () {
    Route::get('/', [AccountController::class, 'index']);
    Route::get('/account', [AccountController::class, 'index']);
    // -----------------------------------------------------

});

Route::prefix('backend')
    ->namespace('\App\Http\Controllers\Backend')
    ->middleware([
        // '',
    ])->group(function () {
    Route::get('/', [AccountController::class, 'index']);
    Route::get('/accounts', [AccountController::class, 'index']);
    Route::get('/accounts/{method}', [AccountController::class, 'add']);
    Route::get('/accounts/id/{id}/{method}', [AccountController::class, 'edit']);
    // -----------------------------------------------------

});
