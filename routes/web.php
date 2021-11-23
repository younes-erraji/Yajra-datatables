<?php

use App\Http\Controllers\CountriesController;
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

Route::get('/', [CountriesController::class, 'index']);
Route::get('/buttons', [CountriesController::class, 'buttons']);
Route::post('store', [CountriesController::class, 'store'])->name('store');
Route::post('delete', [CountriesController::class, 'delete'])->name('delete');
Route::post('update', [CountriesController::class, 'update'])->name('update');
Route::get('getCountries', [CountriesController::class, 'getCountries'])->name('getCountries');
Route::post('getCountryDetails', [CountriesController::class, 'getCountryDetails'])->name('getCountryDetails');
