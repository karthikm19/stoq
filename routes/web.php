<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StockPriceController;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('livewire/stoq/home');
})->name('home');

/*
 * Stock Price REST Controller
 */
Route::post('stoq/check-price', 'StockPriceController@check');

/*
 * Facebook authentication routes
 */
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('facebook/callback', [SocialController::class, 'loginWithFacebook']);