<?php

use Illuminate\Support\Facades\Route;
use App\Api\Controllers\Backend\Table\TableController;
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
    // ->namespace('')     // 似乎有Bug，不能用這個
    ->middleware([
        // '',
    ])->group(function () {
    Route::post('/table', [TableController::class, 'index']);
    // -----------------------------------------------------

});
// Route::prefix('backend')
//     ->namespace('App\Api\Controllers\Backend\Table')
//     ->middleware([
//         // '',
//     ])->group(function () {
//     Route::post('/table', 'TableController@index');
//     // -----------------------------------------------------

// });
