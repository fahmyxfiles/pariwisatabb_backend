<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\HotelController;
use App\Http\Controllers\API\GuestHouseController;
use App\Http\Controllers\API\TouristAttractionController;
use App\Http\Controllers\API\TouristAttractionCategoryController;

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

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'VueController@index')->where('any', '.*')->name('vue');
});


Route::prefix('json')->group(function () {
    Route::get('/hotel', [HotelController::class, 'index']);
    Route::get('/guest_house', [GuestHouseController::class, 'index']);
    Route::get('/tourist_attraction', [TouristAttractionController::class, 'index']);
    Route::get('/tourist_attraction_category', [TouristAttractionCategoryController::class, 'index']);
});