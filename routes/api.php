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
use App\Http\Controllers\API\HotelRoomPricingController;
use App\Http\Controllers\API\HotelImageController;
use App\Http\Controllers\API\GuestHouseController;
use App\Http\Controllers\API\GuestHouseRoomController;
use App\Http\Controllers\API\GuestHouseRoomPricingController;
use App\Http\Controllers\API\GuestHouseImageController;
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
    Route::post('hotel/{hotel}/syncFacilities', [HotelController::class, 'syncFacilities']);

    // Hotel room
    Route::resource('hotel_room', HotelRoomController::class);
    Route::post('hotel_room/{hotelRoom}/syncFacilities', [HotelRoomController::class, 'syncFacilities']);

    // Hotel room pricing
    Route::resource('hotel_room_pricing', HotelRoomPricingController::class);
    
    // Hotel images
    Route::resource('hotel_image', HotelImageController::class);

    // GuestHouses and Regencies
    Route::get('guest_house/getAvailableRegencies', [GuestHouseController::class, 'getAvailableRegencies']);
    Route::resource('guest_house', GuestHouseController::class);
    Route::post('guest_house/{guestHouse}/syncFacilities', [GuestHouseController::class, 'syncFacilities']);

    // GuestHouse room
    Route::resource('guest_house_room', GuestHouseRoomController::class);
    Route::post('guest_house_room/{guestHouseRoom}/syncFacilities', [GuestHouseRoomController::class, 'syncFacilities']);

    // GuestHouse room pricing
    Route::resource('guest_house_room_pricing', GuestHouseRoomPricingController::class);
    
    // GuestHouse images
    Route::resource('guest_house_image', GuestHouseImageController::class);

    // Facilities
    Route::get('facility/getAllFacility', [FacilityController::class, 'getAllFacility']);
    Route::get('facility/getAvailableCategories', [FacilityController::class, 'getAvailableCategories']);
    Route::get('facility/getAvailableCategoriesByType/{type}', [FacilityController::class, 'getAvailableCategoriesByType']);
    Route::resource('facility', FacilityController::class);
});
