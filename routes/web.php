<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\CarrierController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\JettyController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\MarineController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VesselController;
use App\Models\Platform;
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
   Route::prefix('platform')->group(function () {
      Route::get('/', [PlatformController::class, 'index'])->name('platform');
      Route::get('/create', [PlatformController::class, 'create'])->name('platform.create');
      Route::post('/store', [PlatformController::class, 'store'])->name('platform.store');
      Route::get('/edit/{platform:id}', [PlatformController::class, 'edit'])->name('platform.edit');
      Route::put('/update', [PlatformController::class, 'update'])->name('platform.update');
      Route::get('/detail/{platform:id}', [PlatformController::class, 'detail'])->name('platform.detail');
      Route::get('/delete/{platform:id}', [PlatformController::class, 'delete'])->name('platform.delete');

      Route::get('/party/{platform:id}', [PlatformController::class, 'parties'])->name('platform.party');
   });
   Route::prefix('party')->group(function () {
      Route::get('/', [PartyController::class, 'index'])->name('party');
      Route::get('/create', [PartyController::class, 'create'])->name('party.create');
      Route::post('/store', [PartyController::class, 'store'])->name('party.store');
      Route::get('/edit/{party:id}', [PartyController::class, 'edit'])->name('party.edit');
      Route::put('/update', [PartyController::class, 'update'])->name('party.update');
      Route::get('/detail/{party:id}', [PartyController::class, 'detail'])->name('party.detail');
      Route::get('/delete/{party:id}', [PartyController::class, 'delete'])->name('party.delete');
   });

   Route::prefix('carrier')->group(function () {
      Route::get('/', [CarrierController::class, 'index'])->name('carrier');
      Route::get('create', [CarrierController::class, 'create'])->name('carrier.create');
      Route::post('store', [CarrierController::class, 'store'])->name('carrier.store');
      Route::get('edit/{carrier:id}', [CarrierController::class, 'edit'])->name('carrier.edit');
      Route::put('update', [CarrierController::class, 'update'])->name('carrier.update');
      Route::get('delete/{carrier:id}', [CarrierController::class, 'delete'])->name('carrier.delete');
   });

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

      Route::get('vessel/request/{vessel:id}', [VesselController::class, 'schedule'])->name('schedule.request.vessel');
      Route::get('vessel/month/{month}', [VesselController::class, 'scheduleMonth'])->name('schedule.month.request.vessel');

      Route::get('month/{month}', [ScheduleController::class, 'month'])->name('schedule.month');
      Route::get('print/{month}', [ExportController::class, 'schedule'])->name('schedule.print');

      Route::get('report/departure/{schedule:id}', [ReportController::class, 'departure'])->name('schedule.report.departure');
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
   Route::prefix('cargo')->group(function () {
      Route::get('create', [CargoController::class, 'create'])->name('cargo.create');
      Route::get('check', [CargoController::class, 'check'])->name('cargo.check');
      Route::get('detail', [CargoController::class, 'detail'])->name('cargo.detail');
   });
   Route::prefix('user')->group(function () {
      Route::get('index', [UserController::class, 'index'])->name('user');
      Route::put('update', [UserController::class, 'update'])->name('user.update');
   });
});


Route::prefix('fetch')->group(function () {
   Route::get('jetty/{id}', [FetchController::class, 'fetchJetty']);
   Route::get('schedule/{date}/{id}', [FetchController::class, 'fetchSchedule']);
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
