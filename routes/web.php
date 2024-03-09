<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokasiController;

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



Route::get('/', [LokasiController::class, 'index']);
Route::post('/lokasi/store', [LokasiController::class, 'store']);
Route::get('/lokasi/edit/{id}', [LokasiController::class, 'edit']);
Route::post('/lokasi/update/{id}', [LokasiController::class, 'update']);
Route::get('/lokasi/confirm-delete/{id}', [LokasiController::class, 'confirmDelete']);
Route::delete('/lokasi/destroy/{id}', [LokasiController::class, 'destroy']);

