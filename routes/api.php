<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// calendar
Route::group(['prefix' => 'calendar', 'as' => 'calendars'], function(){
    Route::get('/', [CalendarController::class, 'index'])->name('index');
    Route::get('/{id}', [CalendarController::class, 'show'])->name('show');
    Route::post('/', [CalendarController::class, 'create'])->name('create');
    Route::put('/{id}', [CalendarController::class, 'save'])->name('update');
    Route::delete('/{id}', [CalendarController::class, 'destroy'])->name('delete');
});

// events
Route::group(['prefix' => 'event', 'as' => 'events'], function(){
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get("/{id}", [EventController::class, 'show'])->name('show');
    Route::post('/', [EventController::class, 'create'])->name('create');
    Route::put('/{id}', [EventController::class, 'save'])->name('update');
    Route::delete('/{id}', [EventController::class, 'destroy'])->name('delete');
});