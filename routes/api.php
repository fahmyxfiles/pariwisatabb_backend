<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserDeviceController;
use App\Http\Controllers\API\AuthController;

use App\Http\Controllers\API\RegencyController;

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
    
    Route::resource('user', UserController::class);
    
    Route::resource('user_device', UserDeviceController::class);

    Route::get('regency/getAvailableProvinces', [RegencyController::class, 'getAvailableProvinces']);
    Route::resource('regency', RegencyController::class);
});
