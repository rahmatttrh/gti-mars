<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CarrierController;
use App\Http\Controllers\Department\CargoItemController;
use App\Http\Controllers\Department\DepartmentRequestController;
use App\Http\Controllers\Department\DepartmentScheduleController;
use App\Http\Controllers\Department\PassengerItemController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\JettyController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\Marine\MarineDeviationController;
use App\Http\Controllers\Marine\MarineRequestController;
use App\Http\Controllers\Marine\MarineScheduleController;
use App\Http\Controllers\MarineController;
use App\Http\Controllers\ParentRequestController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Vessel\VesselDeviationController;
use App\Http\Controllers\Vessel\VesselScheduleController;
use App\Http\Controllers\VesselController;
use App\Models\Activity;
use App\Models\ParentRequest;
use App\Models\Platform;
use App\Models\Request;
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

   Route::get('send-email', [EmailController::class, 'test'])->name('test.email');

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
      Route::get('create-old', [ScheduleController::class, 'createOld'])->name('schedule.create.old');

      Route::get('detail/{schedule:id}', [ScheduleController::class, 'detail'])->name('schedule.detail');

      Route::get('marine/request', [MarineController::class, 'scheduleRequest'])->name('schedule.request.marine');
      Route::put('marine/select/vessel', [MarineController::class, 'scheduleSelectVessel'])->name('schedule.select.vessel');

      Route::get('vessel/request/{vessel:id}', [VesselController::class, 'schedule'])->name('schedule.request.vessel');
      Route::get('vessel/month/{month}', [VesselController::class, 'scheduleMonth'])->name('schedule.month.request.vessel');

      Route::get('month/{month}', [ScheduleController::class, 'month'])->name('schedule.month');
      Route::get('print/{month}', [ExportController::class, 'schedule'])->name('schedule.print');

      Route::get('report/departure/{schedule:id}', [ReportController::class, 'departure'])->name('schedule.report.departure');
      Route::get('timeline/{schedule:id}', [ScheduleController::class, 'timeline'])->name('schedule.timeline');
   });
   Route::prefix('vessel')->group(function () {
      Route::get('detail/{vessel:id}', [VesselController::class, 'detail'])->name('vessel.detail');
      Route::get('history/{vessel:id}/{month}', [VesselController::class, 'history'])->name('vessel.history');
   });
   // Route::prefix('port')->group(function () {
   //    Route::get('index', [PortController::class, 'index'])->name('port');
   //    Route::post('store', [PortController::class, 'store'])->name('port.store');
   //    Route::put('update', [PortController::class, 'update'])->name('port.update');
   //    Route::get('detail/{port:id}', [PortController::class, 'detail'])->name('port.detail');
   //    Route::get('delete/{port:id}', [PortController::class, 'delete'])->name('port.delete');

   //    Route::post('jetty/store', [JettyController::class, 'store'])->name('port.add.jetty');
   //    Route::put('jety/update', [JettyController::class, 'update'])->name('port.update.jetty');
   //    Route::get('jety/delete/{jetty:id}', [JettyController::class, 'delete'])->name('port.delete.jetty');
   // });
   Route::prefix('logistic')->group(function () {
      Route::get('index', [LogisticController::class, 'index'])->name('logistic');
      Route::post('store', [LogisticController::class, 'store'])->name('logistic.store');
      Route::put('update', [LogisticController::class, 'update'])->name('logistic.update');
   });
   Route::prefix('cargo')->group(function () {
      Route::get('create', [CargoController::class, 'create'])->name('cargo.create');
      Route::post('check', [CargoController::class, 'check'])->name('cargo.check');
      Route::post('choose', [CargoController::class, 'choose'])->name('cargo.choose');

      Route::get('progress', [CargoController::class, 'progress'])->name('cargo.progress');
      Route::get('timeline', [CargoController::class, 'timeline'])->name('cargo.timeline');
      Route::get('receipt', [ExportController::class, 'cargo'])->name('cargo.receipt');

      Route::get('check-dummy', [CargoController::class, 'checkDummy'])->name('cargo.check.dummy');
      Route::get('detail', [CargoController::class, 'detail'])->name('cargo.detail');
   });
   Route::prefix('user')->group(function () {
      Route::get('index', [UserController::class, 'index'])->name('user');
      Route::put('update', [UserController::class, 'update'])->name('user.update');
   });
   Route::prefix('request')->group(function () {
      Route::get('/', [RequestController::class, 'index'])->name('request');
      Route::get('month/{month}', [RequestController::class, 'month'])->name('request.month');
      Route::get('progress/month/{month}', [RequestController::class, 'monthProgress'])->name('request.month.progress');

      Route::post('check', [RequestController::class, 'check'])->name('request.check');
      Route::post('store', [RequestController::class, 'store'])->name('request.store');
      Route::get('detail/{request:id}', [RequestController::class, 'detail'])->name('request.detail');
      Route::get('parent/detail/{parent:id}', [ParentRequestController::class, 'detail'])->name('request.detail.parent');

      Route::get('approve/{request:id}', [RequestController::class, 'approve'])->name('request.approve');

      Route::get('print/{month}', [ExportController::class, 'request'])->name('request.print');
      Route::get('progress/print/{month}', [ExportController::class, 'requestProgress'])->name('request.print.progress');




      Route::get('progress-marine', [RequestController::class, 'progressMarine'])->name('request.progress.marine');
   });

   Route::prefix('activity')->group(function () {
      Route::get('/', [ActivityController::class, 'index'])->name('activity');
      Route::post('store', [ActivityController::class, 'store'])->name('activity.store');
      Route::put('update', [ActivityController::class, 'update'])->name('activity.update');
      Route::get('delete/{activity:id}', [ActivityController::class, 'delete'])->name('activity.delete');
   });

   Route::prefix('invoice')->group(function () {
      Route::get('/request/{request:id}', [InvoiceController::class, 'request'])->name('invoice.request');
   });

   Route::prefix('document')->group(function () {
      Route::get('/manifest/{schedule:id}', [DocumentController::class, 'manifest'])->name('document.manifest');
   });

   Route::prefix('employee')->group(function () {
      Route::get('/profile/{employee:id}', [EmployeeController::class, 'profile'])->name('employee.profile');
   });

   Route::get('/forgot-password', function () {
      return view('auth.forgot-password');
   })->name('password.request');
});

// Route::middleware(["auth", "marine"])->group(function () {
//    Route::prefix('port')->group(function () {
//       Route::get('index', [PortController::class, 'index'])->name('port');
//       Route::post('store', [PortController::class, 'store'])->name('port.store');
//       Route::put('update', [PortController::class, 'update'])->name('port.update');
//       Route::get('detail/{port:id}', [PortController::class, 'detail'])->name('port.detail');
//       Route::get('delete/{port:id}', [PortController::class, 'delete'])->name('port.delete');

//       Route::post('jetty/store', [JettyController::class, 'store'])->name('port.add.jetty');
//       Route::put('jety/update', [JettyController::class, 'update'])->name('port.update.jetty');
//       Route::get('jety/delete/{jetty:id}', [JettyController::class, 'delete'])->name('port.delete.jetty');
//    });
// });



Route::group(['middleware' => ['role:marine']], function () {
   Route::get('chart', [HomeController::class, 'chart'])->name('chart');
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

   Route::prefix('employee')->group(function () {
      Route::get('/', [EmployeeController::class, 'index'])->name('employee');
      Route::post('store', [EmployeeController::class, 'store'])->name('employee.store');
      Route::put('update', [EmployeeController::class, 'update'])->name('employee.update');
      Route::get('delete/{employee:id}', [EmployeeController::class, 'delete'])->name('employee.delete');
   });

   Route::prefix('dashboard')->group(function () {
      Route::get('table', [HomeController::class, 'dashboardTable'])->name('dashboard.table');
      Route::get('chart/{month}', [HomeController::class, 'dashboardChart'])->name('dashboard.chart');
   });

   Route::prefix('request')->group(function () {
      Route::put('select/schedule', [MarineRequestController::class, 'selectSchedule'])->name('request.select.schedule');
      Route::post('undo-approve', [MarineRequestController::class, 'undoApprove'])->name('request.undo.approve');
   });
   Route::prefix('schedule')->group(function () {
      Route::get('plan', [MarineScheduleController::class, 'plan'])->name('schedule.plan');
      Route::get('create', [MarineScheduleController::class, 'create'])->name('schedule.create');
      Route::post('store', [MarineScheduleController::class, 'store'])->name('schedule.store');
      Route::get('edit/{schedule:id}', [MarineScheduleController::class, 'edit'])->name('schedule.edit');
      Route::put('update', [MarineScheduleController::class, 'update'])->name('schedule.update');

      Route::get('send/{schedule:id}', [MarineScheduleController::class, 'send'])->name('schedule.send');

      Route::get('remove/reqeust/{request:id}', [MarineScheduleController::class, 'removeRequest'])->name('schedule.remove.request');
   });
   Route::prefix('vessel')->group(function () {
      Route::get('index', [VesselController::class, 'index'])->name('vessel');
      Route::get('create', [VesselController::class, 'create'])->name('vessel.create');
      Route::post('store', [VesselController::class, 'store'])->name('vessel.store');
      Route::get('edit/{vessel:id}', [VesselController::class, 'edit'])->name('vessel.edit');
      Route::put('update', [VesselController::class, 'update'])->name('vessel.update');
      Route::get('delete/{vessel:id}', [VesselController::class, 'delete'])->name('vessel.delete');
   });
   Route::prefix('deviation')->group(function () {
      Route::post('add', [MarineDeviationController::class, 'add'])->name('schedule.add.deviation');
      Route::get('delete/{deviation:id}', [MarineDeviationController::class, 'delete'])->name('schedule.delete.deviation');
   });
});

Route::group(['middleware' => ['role:logistic|drilling|department']], function () {
   Route::prefix('department/request')->group(function () {
      Route::get('create', [DepartmentRequestController::class, 'create'])->name('request.create');
      Route::post('save', [DepartmentRequestController::class, 'save'])->name('request.save');
      Route::post('store', [DepartmentRequestController::class, 'store'])->name('request.store');
      Route::post('add', [DepartmentRequestController::class, 'add'])->name('request.add');

      Route::get('draft', [DepartmentRequestController::class, 'draft'])->name('request.draft');
      Route::get('progress', [DepartmentRequestController::class, 'progress'])->name('request.progress');
      Route::get('history', [DepartmentRequestController::class, 'history'])->name('request.history');
      Route::get('release/{request:id}', [DepartmentRequestController::class, 'release'])->name('request.release');
      Route::get('parent/release/{parent:id}', [ParentRequestController::class, 'release'])->name('request.release.parent');

      Route::post('undo', [DepartmentRequestController::class, 'undo'])->name('request.undo');
      Route::get('delete/{request:id}', [DepartmentRequestController::class, 'delete'])->name('request.delete');
      Route::get('parent/delete/{parent:id}', [ParentRequestController::class, 'delete'])->name('request.delete.parent');
      Route::get('edit/{request:id}', [DepartmentRequestController::class, 'edit'])->name('request.edit');
      Route::put('update', [DepartmentRequestController::class, 'update'])->name('request.update');
   });
});

Route::group(['middleware' => ['role:logistic|department']], function () {
   Route::prefix('cargo/item')->group(function () {
      Route::post('store', [CargoItemController::class, 'store'])->name('cargo.item.store');
      Route::get('delete/{id}', [CargoItemController::class, 'delete'])->name('cargo.item.delete');
   });
});

Route::group(['middleware' => ['role:drilling|department']], function () {
   Route::prefix('passenger/item')->group(function () {
      Route::post('store', [PassengerItemController::class, 'store'])->name('passenger.item.store');
      Route::get('delete/{id}', [PassengerItemController::class, 'delete'])->name('passenger.item.delete');
   });
});

Route::group(['middleware' => ['role:vessel']], function () {
   Route::prefix('schedule')->group(function () {
      Route::get('standby/{schedule:id}', [VesselScheduleController::class, 'standby'])->name('schedule.standby');
      Route::get('loading/{schedule:id}', [VesselScheduleController::class, 'loading'])->name('schedule.loading');
      Route::get('loading/complete/{schedule:id}', [VesselScheduleController::class, 'loadingEnd'])->name('schedule.loading.complete');
      Route::get('castoff/{schedule:id}', [VesselScheduleController::class, 'castoff'])->name('schedule.castoff');
      Route::get('fullaway/{schedule:id}', [VesselScheduleController::class, 'fullaway'])->name('schedule.fullaway');
      Route::get('arrive/{schedule:id}', [VesselScheduleController::class, 'arrive'])->name('schedule.arrive');
      Route::get('standby-dest/{schedule:id}', [VesselScheduleController::class, 'standbyDest'])->name('schedule.standby.dest');
      Route::get('unloading/{schedule:id}', [VesselScheduleController::class, 'unloading'])->name('schedule.unloading');
      Route::get('unloading/complete/{schedule:id}', [VesselScheduleController::class, 'unloadingEnd'])->name('schedule.unloading.complete');
      Route::get('complete/{schedule:id}', [VesselScheduleController::class, 'complete'])->name('schedule.complete');
      Route::get('deviation/confirm/{deviation:id}', [VesselDeviationController::class, 'confirm'])->name('schedule.confirm.deviation');
      Route::get('deviation/arrive/{deviation:id}', [VesselDeviationController::class, 'arrive'])->name('schedule.arrive.deviation');
      Route::get('deviation/complete/{deviation:id}', [VesselDeviationController::class, 'complete'])->name('schedule.complete.deviation');
   });
});











Route::prefix('fetch')->group(function () {
   Route::get('jetty/{id}', [FetchController::class, 'fetchJetty']);
   Route::get('schedule/{date}/{id}', [FetchController::class, 'fetchSchedule']);
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
