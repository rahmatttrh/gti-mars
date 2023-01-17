<?php

use App\Http\Controllers\PortController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VesselController;
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

Route::middleware(["auth"])->group(function () {
   Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   Route::prefix('schedule')->group(function () {
      Route::get('index', [ScheduleController::class, 'index'])->name('schedule');
      Route::post('store', [ScheduleController::class, 'store'])->name('schedule.store');
      Route::get('detail/{schedule:id}', [ScheduleController::class, 'detail'])->name('schedule.detail');
   });
   Route::prefix('vessel')->group(function () {
      Route::get('index', [VesselController::class, 'index'])->name('vessel');
      Route::post('store', [VesselController::class, 'store'])->name('vessel.store');
      Route::get('detail/{vessel:id}', [VesselController::class, 'detail'])->name('vessel.detail');
   });
   Route::prefix('port')->group(function () {
      Route::get('index', [PortController::class, 'index'])->name('port');
   });
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
