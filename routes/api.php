<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserDeviceController;
use App\Http\Controllers\API\AuthController;

use App\Http\Controllers\API\RegencyController;
use App\Http\Controllers\API\HotelController;
use App\Http\Controllers\API\HotelRoomController;
use App\Http\Controllers\API\FacilityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

     
Route::middleware('auth:api')->group( function () {
    // Get current logged in user
    Route::get('users', [AuthController::class, 'users']);

    // Permissions
    Route::get('role/getAvailablePermissions', [RoleController::class, 'getAvailablePermissions']);
    Route::resource('role', RoleController::class);
    
    // User
    Route::resource('user', UserController::class);
    
    // User devices
    Route::resource('user_device', UserDeviceController::class);

    // Regency and Provinces
    Route::get('regency/getAvailableProvinces', [RegencyController::class, 'getAvailableProvinces']);
    Route::resource('regency', RegencyController::class);

    // Hotels and Regencies
    Route::get('hotel/getAvailableRegencies', [HotelController::class, 'getAvailableRegencies']);
    Route::resource('hotel', HotelController::class);

    // Hotel room
    Route::resource('hotel_room', HotelRoomController::class);


    // Facilities
    Route::get('facility/getAllFacility', [FacilityController::class, 'getAllFacility']);
    Route::get('facility/getAvailableCategories', [FacilityController::class, 'getAvailableCategories']);
    Route::get('facility/getAvailableCategoriesByType/{type}', [FacilityController::class, 'getAvailableCategoriesByType']);
    Route::resource('facility', FacilityController::class);
});
