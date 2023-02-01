<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\JettyController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\MarineController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VesselController;
use App\Models\Schedule;
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
      Route::get('fixed', [ScheduleController::class, 'fixed'])->name('schedule.fixed');
      Route::get('request', [ScheduleController::class, 'request'])->name('schedule.request');
      Route::get('create', [ScheduleController::class, 'create'])->name('schedule.create');
      Route::get('create-old', [ScheduleController::class, 'createOld'])->name('schedule.create.old');
      Route::post('store', [ScheduleController::class, 'store'])->name('schedule.store');
      Route::get('edit/{schedule:id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
      Route::put('update', [ScheduleController::class, 'update'])->name('schedule.update');

      Route::get('detail/{schedule:id}', [ScheduleController::class, 'detail'])->name('schedule.detail');

      Route::get('marine/request', [MarineController::class, 'scheduleRequest'])->name('schedule.request.marine');
      Route::put('marine/select/vessel', [MarineController::class, 'scheduleSelectVessel'])->name('schedule.select.vessel');

      Route::post('print', [ExportController::class, 'schedule'])->name('schedule.print');
   });
   Route::prefix('vessel')->group(function () {
      Route::get('index', [VesselController::class, 'index'])->name('vessel');
      Route::get('create', [VesselController::class, 'create'])->name('vessel.create');

      Route::post('store', [VesselController::class, 'store'])->name('vessel.store');
      Route::get('edit/{vessel:id}', [VesselController::class, 'edit'])->name('vessel.edit');
      Route::put('update', [VesselController::class, 'update'])->name('vessel.update');
      Route::get('detail/{vessel:id}', [VesselController::class, 'detail'])->name('vessel.detail');
      Route::get('delete/{vessel:id}', [VesselController::class, 'delete'])->name('vessel.delete');
   });
   Route::prefix('port')->group(function () {
      Route::get('index', [PortController::class, 'index'])->name('port');
      Route::post('store', [PortController::class, 'store'])->name('port.store');
      Route::put('update', [PortController::class, 'update'])->name('port.update');
      Route::get('detail/{port:id}', [PortController::class, 'detail'])->name('port.detail');
      Route::get('delete/{port:id}', [PortController::class, 'delete'])->name('port.delete');

      Route::post('jetty/store', [JettyController::class, 'store'])->name('port.add.jetty');
      Route::put('jety/update', [JettyController::class, 'update'])->name('port.update.jetty');
      Route::get('jety/delete/{jetty:id}', [JettyController::class, 'delete'])->name('port.delete.jetty');
   });
   Route::prefix('logistic')->group(function () {
      Route::get('index', [LogisticController::class, 'index'])->name('logistic');
      Route::post('store', [LogisticController::class, 'store'])->name('logistic.store');
      Route::put('update', [LogisticController::class, 'update'])->name('logistic.update');
   });


   Route::prefix('user')->group(function () {
      Route::get('index', [UserController::class, 'index'])->name('user');
   });
});


Route::prefix('fetch')->group(function () {
   Route::get('jetty/{id}', [FetchController::class, 'fetchJetty']);
   Route::get('schedule/{date}/{id}', [FetchController::class, 'fetchSchedule']);
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
