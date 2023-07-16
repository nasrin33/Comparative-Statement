<?php

use App\Http\Controllers\CSController;
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

// Route::get('/', function () {
//     return view('list');
// });

Route::get('/', [CSController::class, 'index']);


Route::controller(App\Http\Controllers\CSController::class)->group(function () {
    
    Route::get('/cs', 'index');
    Route::get('/cs/create', 'create');
    Route::post('/cs', 'store');
    Route::get('/cs/{cs}/edit', 'edit');
    Route::put('/cs/{cs}', 'update');
    Route::get('/cs/{cs}/details', 'view');
    Route::get('/cs/{cs}/delete', 'delete');
});
