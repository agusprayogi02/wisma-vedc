<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\RoomItemController;
use App\Http\Controllers\Api\RoomItemReportController;
use App\Http\Controllers\Api\RoomUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the "api"
| middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->group(function () {
//    Route::get('rooms', [RoomController::class, 'index']);
//});

// Rute tanpa autentikasi
Route::post('/login', [AuthController::class, 'authenticate']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('rooms', [RoomController::class, 'index']);
    Route::get('rooms/total_used', [RoomController::class, 'totalRoomUsedToday']);
    Route::get('rooms/total_ready', [RoomController::class, 'totalRoomReadyToday']);
    Route::get('rooms/total_kotor', [RoomController::class, 'totalRoomKotorToday']);
    Route::get('rooms/total_used_by_asrama', [RoomController::class, 'totalRoomUsedByAsramaToday']);
    Route::get('rooms/total', [RoomController::class, 'totalRoom']);
    Route::get('room_item_reports', [RoomItemReportController::class, 'index']);
    Route::get('room_item_reports/total_rusak', [RoomItemReportController::class, 'totalRusak']);
    Route::get('room_item_reports/total_hilang', [RoomItemReportController::class, 'totalHilang']);
    Route::get('room_item_reports/total', [RoomItemReportController::class, 'total']);
    Route::get('room_user_reports', [RoomUserController::class, 'RoomUser']);
    Route::get('room_items', [RoomItemController::class, 'RoomItem']);

    Route::put('rooms/{id}', [RoomController::class, 'updateRoomStatus']);
});
