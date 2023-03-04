<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResponsiveLetterController;
use App\Http\Controllers\SubsidiaryController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/login', [AuthController::class, 'login']);

Route::apiResource('employees', EmployeeController::class);
Route::apiResource('subsidiaries', SubsidiaryController::class);
Route::apiResource('items', ItemController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('permissions', PermissionController::class);

Route::post('subsidiaries/{id}/inventory', [SubsidiaryController::class, 'addItems']);
Route::get('subsidiaries/{id}/inventory', [SubsidiaryController::class, 'inventory']);
Route::delete('subsidiaries/{id}/inventory/{itemId}', [SubsidiaryController::class, 'removeItem']);

Route::get('responsives', [ResponsiveLetterController::class, 'index']);

Route::get('employees/{id}/subsidiaries', [EmployeeController::class, 'subsidiaries']);

Route::post('employees/{id}/responsives', [EmployeeController::class, 'generateResponsive']);

Route::post('transfers', [TransferController::class, 'store']);
Route::get('transfers', [TransferController::class, 'index']);

Route::get('users/{id}/permissions', [UserController::class, 'permissions']);
Route::post('users/{id}/permissions', [UserController::class, 'assignPermissions']);
