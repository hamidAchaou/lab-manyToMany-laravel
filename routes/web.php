<?php

use App\Http\Controllers\CongesController;
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



Route::get('/', [CongesController::class, 'index'])->name('conges.index');
Route::get('/create', [CongesController::class, 'create'])->name('conges.create');

Route::resource('/conges', CongesController::class);

