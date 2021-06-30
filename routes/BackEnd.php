<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PostController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




Route::get('/backend',[PostController::class,'BackEnd']);
Route::namespace('BackEnd')-> group(function() {


    Route::get('/save',[PostController::class,'create'])->name('save.create');

    Route::POST('/save/store',[PostController::class,'store'])->name('save.store');

    Route::get('/result',[PostController::class,'index'])->name('save.index');
});