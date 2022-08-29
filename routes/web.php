<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StadisticController;
use App\Http\Controllers\UserSystemInfoController;

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

Route::get('/', [AppController::class, 'index']);

Route::resource('user', UserController::class);

Route::get('/masvisitados', [StadisticController::class, 'index']);

Route::get('/masvisitados/chart', [StadisticController::class, 'chart']);

Route::get('/nosotros', [AppController::class, 'nosotros']);

Route::get('/configuracion', [PostController::class, 'index'])->middleware('auth')->name('configuracion');

Route::resource('post', PostController::class);


Route::post('addstadistic',[StadisticController::class, 'addClickStadistic'])->name('addstadistics');


Route::get('/getuser',[UserSystemInfoController::class, 'getusersysteminfo']);
require __DIR__.'/auth.php';

