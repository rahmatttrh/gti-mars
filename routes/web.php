<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CarrierController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\Department\CargoItemController;
use App\Http\Controllers\Department\DepartmentAdditionalController;
use App\Http\Controllers\Department\DepartmentRequestController;
use App\Http\Controllers\Department\DepartmentScheduleController;
use App\Http\Controllers\Department\PassengerItemController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\GeofenceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\JettyController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\Marine\IntermilanController;
use App\Http\Controllers\Marine\MarineAdditionalController;
use App\Http\Controllers\Marine\MarineDeviationController;
use App\Http\Controllers\Marine\MarineMasterController;
use App\Http\Controllers\Marine\MarineRequestController;
use App\Http\Controllers\Marine\MarineScheduleController;
use App\Http\Controllers\Marine\MarineVdrController;
use App\Http\Controllers\MarineController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ParentRequestController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportSurveillanceController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SurveillanceCargoController;
use App\Http\Controllers\SurveillanceController;
use App\Http\Controllers\SurveillanceCrewController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VdrController;
use App\Http\Controllers\VdrCrewController;
use App\Http\Controllers\VdrPeriodicController;
use App\Http\Controllers\Vessel\VesselDeviationController;
use App\Http\Controllers\Vessel\VesselRequestController;
use App\Http\Controllers\Vessel\VesselScheduleController;
use App\Http\Controllers\Vessel\VesselVdrController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\VesselCrewController;
use App\Models\Activity;
use App\Models\Document;
use App\Models\ParentRequest;
use App\Models\Platform;
use App\Models\Request;
use App\Models\Schedule;
use App\Models\Surveillance;
use App\Models\VdrPeriodic;
use App\Models\VesselCrew;
use Illuminate\Support\Facades\Auth;
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
   Route::get('phpinfo', fn () => phpinfo());
   Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   //    Route::group(['middleware' => ['role:marine']], function () {
   //       Route::get('/', [App\Http\Controllers\HomeController::class, 'map'])->name('home');
   //    });
   //    Route::group(['middleware' => ['role:department|vessel']], function () {
   //       Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   //   });
   Route::put('request/update', [DepartmentRequestController::class, 'update'])->name('request.update');
   Route::put('request/bcm/update', [DepartmentRequestController::class, 'updateBcm'])->name('request.update.bcm');
   Route::put('cargo/update/logistic', [CargoItemController::class, 'updateLogistic'])->name('cargo.update.logistic');
   Route::get('crew/drop/{id}', [RequestController::class, 'crewDrop'])->name('crew.drop');
   
   Route::prefix('news')->group(function () {
      
      Route::get('detail/{id}', [NewsController::class, 'detail'])->name('news.detail');
      Route::post('store', [NewsController::class, 'store'])->name('news.store');
   });

   Route::get('forbidden', [HomeController::class, 'forbidden'])->name('forbidden');

   

   Route::prefix('document')->group(function () {
      Route::post('add', [DocumentController::class, 'add'])->name('document.add');
      Route::put('update', [DocumentController::class, 'update'])->name('document.update');
   });

   Route::get("proact/dashboard", [HomeController::class, "proact",])->name('proact');
   Route::get("map/dashboard", [HomeController::class, "mapp",])->name('map');
   Route::get("fms/dashboard", [HomeController::class, "fms",])->name('fms');
   Route::get("hse/dashboard", [HomeController::class, "hse",])->name('hse');

   Route::put("vessel/stowage/update", [VesselController::class, "updateStowage",])->name('vessel.stowage.update');
   
   
   Route::prefix('user')->group(function () {
      Route::get('index', [UserController::class, 'index'])->name('user');
      Route::post('store', [UserController::class, 'store'])->name('user.store');
      Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
      Route::get('detail/{id}', [UserController::class, 'detail'])->name('user.detail');
      Route::put('update', [UserController::class, 'update'])->name('user.update');
      Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
   });

   Route::get('vdr/detail/{id}', [VdrController::class, 'show'])->name('vdr.show');

   Route::prefix('fuel')->group(function () {
      Route::put('approve', [FuelController::class, 'approve'])->name('fuel.approve');
   });

   Route::prefix("dsp")->group(function () {
      // Route::get("marine/dashboard", [HomeController::class, "dspMarine",])->name('dsp.marine');
      // Route::get("vessel/dashboard", [HomeController::class, "dspVessel",])->name('dsp.vessel');
      
   });

   Route::prefix("dsp")->group(function () {
      Route::get("fm/dashboard", [HomeController::class, "dspFm",])->name('dsp.fm');
      // Route::get("vessel-dashboard", [HomeController::class, "dspVessel",])->name('dsp.vessel');
      // Route::get("user-dashboard", [HomeController::class, "dspUser",])->name('dsp.user');
   });

   

   Route::prefix("surveillance")->group(function () {
      Route::get("marine", [SurveillanceController::class, "marine",])->name('surveillance.marine');

      Route::get("create", [SurveillanceController::class, "create",])->name('surveillance.create');
      Route::get("detail/{id}", [SurveillanceController::class, "detail",])->name('surveillance.detail');
      Route::post("cargo/store", [SurveillanceCargoController::class, "store",])->name('surveillance.cargo.store');
      Route::get("cargo/send/{id}", [SurveillanceCargoController::class, "send",])->name('surveillance.cargo.send');
      Route::get("cargo/drop/{id}", [SurveillanceCargoController::class, "drop",])->name('surveillance.cargo.drop');

      Route::post("crew/store", [SurveillanceCrewController::class, "store",])->name('surveillance.crew.store');
      Route::get("today", [SurveillanceController::class, "today",])->name('surveillance.today');
      Route::get("complete/{id}", [SurveillanceController::class, "complete",])->name('surveillance.complete');

      Route::get("history/vessel", [SurveillanceController::class, "historyVessel",])->name('surveillance.history.vessel');
      Route::get("history/user", [SurveillanceController::class, "historyUser",])->name('surveillance.history.user');

      Route::prefix("report")->group(function () {
         Route::post("store", [ReportSurveillanceController::class, "store",])->name('surveillance.report.store');
      });
   });

   Route::prefix("fetch")->group(function () {
      Route::get("schedule/{date}/{value}", [FetchController::class, "fetchSchedules",]);
   });

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

   Route::get('documents', [DocController::class, 'index'])->name('document');

   Route::prefix('schedule')->group(function () {
      Route::get('fixed', [ScheduleController::class, 'fixed'])->name('schedule.fixed');
      Route::get('create-old', [ScheduleController::class, 'createOld'])->name('schedule.create.old');

      Route::get('detail/{schedule:id}', [ScheduleController::class, 'detail'])->name('schedule.detail');
      Route::get('timeline/{id}', [ScheduleController::class, 'timeline'])->name('schedule.timeline');

      Route::get('marine/request', [MarineController::class, 'scheduleRequest'])->name('schedule.request.marine');
      Route::put('marine/select/vessel', [MarineController::class, 'scheduleSelectVessel'])->name('schedule.select.vessel');
      Route::put('select/vessel/marine', [MarineScheduleController::class, 'selectVessel'])->name('schedule.select.vessel2');

      Route::get('vessel/request/{vessel:id}', [VesselController::class, 'schedule'])->name('schedule.request.vessel');
      Route::get('vessel/month/{month}', [VesselController::class, 'scheduleMonth'])->name('schedule.month.request.vessel');

      Route::get('month/{month}', [ScheduleController::class, 'month'])->name('schedule.month');
      Route::get('print/{status}/{month}', [ExportController::class, 'schedule'])->name('schedule.print');

      Route::get('report/departure/{schedule:id}', [ReportController::class, 'departure'])->name('schedule.report.departure');
      Route::get('timeline/{schedule:id}', [ScheduleController::class, 'timeline'])->name('schedule.timeline');
   });
   Route::prefix('vessel')->group(function () {
      Route::get('detail/{vessel:id}', [VesselController::class, 'detail'])->name('vessel.detail');
      Route::get('history/{vessel:id}/{month}', [VesselController::class, 'history'])->name('vessel.history');
      Route::get('onhire/{id}', [VesselController::class, 'onhire'])->name('vessel.onhire');
      Route::get('offhire/{id}', [VesselController::class, 'offhire'])->name('vessel.offhire');
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

   Route::get('request/log/app/{id}', [RequestController::class, 'logApprove'])->name('request.logistic.approve');
   Route::get('item/log/app/{id}', [CargoItemController::class, 'logApprove'])->name('item.logistic.approve');
   Route::put('item/log/reject', [CargoItemController::class, 'logReject'])->name('item.logistic.reject');
   Route::get('log/edit/mtd/{id}', [ScheduleController::class, 'editMtd'])->name('logistic.edit.mtd');
   Route::get('log/edit/bcm/{id}', [ScheduleController::class, 'editBcm'])->name('logistic.edit.bcm');

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

   Route::prefix('request')->group(function () {
      Route::get('/', [RequestController::class, 'index'])->name('request');
      Route::get('month/{month}', [RequestController::class, 'month'])->name('request.month');
      Route::get('progress/month/{month}', [RequestController::class, 'monthProgress'])->name('request.month.progress');

      Route::post('check', [RequestController::class, 'check'])->name('request.check');
      Route::post('store', [RequestController::class, 'store'])->name('request.store');
      Route::get('detail/{request:id}', [RequestController::class, 'detail'])->name('request.detail');
      Route::get('detail/n/{request:id}', [RequestController::class, 'detailNew'])->name('request.detail.new');
      

      Route::get('approve/{request:id}', [RequestController::class, 'approve'])->name('request.approve');

      Route::get('print/{month}', [ExportController::class, 'request'])->name('request.print');
      Route::get('progress/print/{month}', [ExportController::class, 'requestProgress'])->name('request.print.progress');


      Route::get('parent/release/{parent:id}', [ParentRequestController::class, 'release'])->name('parent.release');
      Route::post('parent/change/vessel', [ParentRequestController::class, 'change'])->name('parent.change.vessel');



      Route::get('progress/marine', [MarineRequestController::class, 'progress'])->name('request.progress.marine');
      Route::get('inbox/marine', [MarineRequestController::class, 'inbox'])->name('request.inbox.marine');
      Route::get('history/marine', [MarineRequestController::class, 'history'])->name('request.history.marine');
   });

   Route::prefix('parent')->group(function () {
      Route::post('add/cargo', [ParentRequestController::class, 'addCargo'])->name('parent.add.cargo');
      Route::post('add/crew', [ParentRequestController::class, 'addCrew'])->name('parent.add.crew');
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
      Route::get('/timeline/{schedule:id}', [DocumentController::class, 'timeline'])->name('document.timeline');
      Route::get('/intermilan/{month}', [DocumentController::class, 'intermilan'])->name('document.intermilan');
      Route::get('/export/intermilan/{start}/{end}', [DocumentController::class, 'intermilanExport'])->name('document.intermilan.export');
      Route::get('/export/cc/{month}/{year}', [DocumentController::class, 'crewChangeExport'])->name('document.crew.change.export');
      Route::get('/vdr/{vdr:id}', [DocumentController::class, 'vdr'])->name('document.vdr');

      Route::get('/mtd/{id}', [DocumentController::class, 'mtd'])->name('document.mtd');
      Route::get('/bcm/{id}', [DocumentController::class, 'bcm'])->name('document.bcm');
   });

   Route::prefix('user')->group(function () {
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




// Level Admin
Route::group(['middleware' => ['role:marine|admin-logistic|admin-dsp|superadmin-dsp|admin-vdr|superadmin-vdr|suptent|chief']], function () {
   Route::prefix('m/statistic')->group(function () {
      Route::post('filter', [HomeController::class, 'indexFilter'])->name('statistic.filter');

      
   });
   
   Route::prefix("dsp/m")->group(function () {
      Route::get("dash/main", [HomeController::class, "dspMarine",])->name('dsp.marine');
      Route::get('dash/map', [HomeController::class, 'fullMap'])->name('map.full');
      Route::get("dash/intermilan/{month}/{year}", [HomeController::class, "dspMarineIntermilan",])->name('dsp.marine.intermilan');
      Route::get("surveillance", [SurveillanceController::class, "marine",])->name('surveillance.marine');
      Route::post("intermilan/filter", [MarineRequestController::class, "filter",])->name('intermilan.filter');
      Route::get("intermilan/filter/{start}/{end}", [MarineRequestController::class, "filterGet",])->name('intermilan.filter.get');

      Route::put('intermilan/select/vessel', [MarineRequestController::class, 'selectVessel'])->name('intermilan.marine.select.vessel');
      Route::put('intermilan/select/schedule', [IntermilanController::class, 'selectSchedule'])->name('intermilan.marine.select.schedule');
      Route::put('request/select/schedule', [IntermilanController::class, 'selectScheduleList'])->name('intermilan.marine.select.schedule.list');
       

      Route::prefix('schedule')->group(function () {
         Route::get('progress', [MarineScheduleController::class, 'progress'])->name('schedule.progress');
         Route::post('progress/filter', [MarineScheduleController::class, 'progressFilter'])->name('schedule.progress.filter');
         Route::get('plan/{month}', [MarineScheduleController::class, 'plan'])->name('schedule.plan');
   
         Route::get('inbox', [MarineScheduleController::class, 'inbox'])->name('schedule.inbox');
         
         Route::get('order/{month}', [MarineScheduleController::class, 'order'])->name('schedule.order');
         Route::get('history', [MarineScheduleController::class, 'history'])->name('schedule.history');
         Route::get('create', [MarineScheduleController::class, 'create'])->name('schedule.create');
         Route::post('store', [MarineScheduleController::class, 'store'])->name('schedule.store');
         Route::post('store/so', [MarineScheduleController::class, 'storeNew'])->name('schedule.store.so');
         Route::get('edit/{schedule:id}', [MarineScheduleController::class, 'edit'])->name('schedule.edit');
         Route::put('update', [MarineScheduleController::class, 'update'])->name('schedule.update');
         Route::put('jetty/update', [MarineScheduleController::class, 'jettyUpdate'])->name('schedule.jetty.update');
         Route::get('delete/{schedule:id}', [MarineScheduleController::class, 'delete'])->name('schedule.delete');
         Route::get('send/{schedule:id}', [MarineScheduleController::class, 'send'])->name('schedule.send');
         Route::post('postpone', [MarineScheduleController::class, 'postpone'])->name('schedule.postpone');
         Route::get('remove/reqeust/{request:id}', [MarineScheduleController::class, 'removeRequest'])->name('schedule.remove.request');
         Route::get('reset/route/{schedule:id}', [MarineScheduleController::class, 'resetRoute'])->name('schedule.reset.route');
         Route::post('add/route', [MarineScheduleController::class, 'addRoute'])->name('schedule.add.route');
         Route::post('reorder/route', [MarineScheduleController::class, 'reorderRoute'])->name('schedule.reorder.route');
         Route::get('delete/route/{id}', [MarineScheduleController::class, 'deleteRoute'])->name('schedule.delete.route');
         Route::post('add/cargo', [MarineScheduleController::class, 'addCargo'])->name('schedule.add.cargo');
      });

      Route::prefix("tracking")->group(function () {
         Route::get('index', [TrackingController::class, "index"])->name('tracking');
         Route::get("user", [MarineRequestController::class, "index",])->name('marine.request');
         Route::post("filter", [MarineRequestController::class, "filter",])->name('intermilan.filter');
      });

      Route::prefix("request")->group(function () {
         Route::post('store', [MarineRequestController::class, "store"])->name('marine.request.store');

         Route::get("/user", [MarineRequestController::class, "index",])->name('marine.request');
         Route::get("/list", [MarineRequestController::class, "indexList",])->name('marine.request.list');
         Route::post("/filter", [MarineRequestController::class, "filter",])->name('intermilan.filter');
      });

      Route::prefix("crew/change")->group(function () {
         Route::get("/index/{month}/{year}", [MarineRequestController::class, "indexListCrew",])->name('marine.crew.change');
         Route::post('filter', [MarineRequestController::class, 'filterCrewChange'])->name('marine.crew.change.filter');
         Route::post('store/', [MarineScheduleController::class, 'storeCrewChangeSchedule'])->name('schedule.store.crew.change');
         Route::post('import/', [MarineScheduleController::class, 'importCrewChange'])->name('marine.crew.change.import');
      });

      Route::prefix("report")->group(function () {
         Route::get('/', [ReportController::class, "index"])->name('report');

         
      });

   });

   Route::prefix("vdr/m")->group(function () {
      Route::get("dashboard", [MarineVdrController::class, "index",])->name('vdr.marine');

      Route::prefix("act")->group(function () {
         Route::get('validation', [MarineVdrController::class, 'validation'])->name('vdr.marine.validation');
         Route::post("filter", [HomeController::class, "vdrFilter",])->name('vdr.filter');
         Route::get("history", [HomeController::class, "vdrMarineTable",])->name('vdr.marine.table');
         // Route::get("vessel-dashboard", [HomeController::class, "vdrVessel",])->name('vdr.vessel');
         // Route::get("user-dashboard", [HomeController::class, "dspUser",])->name('dsp.user');
         Route::get('approve/marine/{id}', [MarineVdrController::class, 'approve'])->name('vdr.approve.marine');
         Route::post('reject/marine', [MarineVdrController::class, 'reject'])->name('vdr.reject.marine');
         Route::get('approve/suptent/{id}', [MarineVdrController::class, 'approveSuptent'])->name('vdr.approve.suptent');
         Route::get('approve/luthfi/{id}', [MarineVdrController::class, 'approveLuthfi'])->name('vdr.approve.luthfi');
      });
      
   });



   Route::prefix("news/m")->group(function () {
      Route::get('/edit', [NewsController::class, 'index'])->name('news.edit');
      Route::put('/update', [NewsController::class, 'update'])->name('news.update');
   });

   Route::prefix("images/m")->group(function () {
      Route::get('index', [ImagesController::class, 'index'])->name('images');
      Route::post('store', [ImagesController::class, 'store'])->name('images.store');
      Route::get('delete/{id}', [ImagesController::class, 'delete'])->name('images.delete');
   });
   
   
   Route::prefix("log")->group(function () {
      Route::get("dsp", [LogController::class, "dsp",])->name('log.dsp');
      Route::get("vdr", [LogController::class, "vdr",])->name('log.vdr');
      Route::post("filter/vdr", [LogController::class, "vdrFilter",])->name('log.vdr.filter');
   });

   Route::prefix("master")->group(function () {
      Route::get("data", [MarineMasterController::class, "index",])->name('master.data');
   });


   Route::get('chart', [HomeController::class, 'chart'])->name('chart');
   // Route::get('dashboard/map', [HomeController::class, 'map'])->name('dashboard.map');

   Route::get('get-distance', [GeofenceController::class, 'getDistance']);

   

   Route::prefix("proact")->group(function () {
      Route::get("marine/dashboard", [HomeController::class, "proactMarine",])->name('proact.marine');
   });

   Route::prefix("map")->group(function () {
      Route::get("marine/dashboard", [HomeController::class, "mapMarine",])->name('map.marine');
   });
   

   Route::prefix('master/data/port')->group(function () {
      Route::get('index', [PortController::class, 'index'])->name('port');
      Route::post('store', [PortController::class, 'store'])->name('port.store');
      Route::get('edit/{id}', [PortController::class, 'edit'])->name('port.edit');
      Route::put('update', [PortController::class, 'update'])->name('port.update');
      Route::get('detail/{port:id}', [PortController::class, 'detail'])->name('port.detail');
      Route::get('delete/{port:id}', [PortController::class, 'delete'])->name('port.delete');

      Route::post('jetty/store', [JettyController::class, 'store'])->name('port.add.jetty');
      Route::put('jety/update', [JettyController::class, 'update'])->name('port.update.jetty');
      Route::get('jety/delete/{jetty:id}', [JettyController::class, 'delete'])->name('port.delete.jetty');
   });

   Route::prefix('crew')->group(function () {
      Route::get('/', [CrewController::class, 'index'])->name('crew');
      Route::post('store', [CrewController::class, 'store'])->name('crew.store');

      Route::put('update', [CrewController::class, 'update'])->name('crew.update');
      Route::get('delete/{crew:id}', [CrewController::class, 'delete'])->name('crew.delete');
   });

   // Route::prefix('user')->group(function () {
   //    Route::get('/', [EmployeeController::class, 'index'])->name('employee');
   //    Route::post('store', [EmployeeController::class, 'store'])->name('employee.store');
   //    Route::put('update', [EmployeeController::class, 'update'])->name('employee.update');
   //    Route::get('delete/{employee:id}', [EmployeeController::class, 'delete'])->name('employee.delete');
   // });


   Route::prefix('dashboard')->group(function () {
      Route::get('table', [HomeController::class, 'dashboardTable'])->name('dashboard.table');
      Route::get('chart/{month}', [HomeController::class, 'dashboardChart'])->name('dashboard.chart');
      Route::get('map/{month}', [HomeController::class, 'map'])->name('dashboard.map');
   });

   Route::prefix('request')->group(function () {
      // Route::get('undo/approve/{id}', [MarineRequestController::class, 'undoApprove'])->name('request.undo.approve');
      Route::get('select/schedule/{request}/{schedule}', [MarineRequestController::class, 'selectSchedule'])->name('request.select.schedule');
      Route::put('change/schedule', [MarineRequestController::class, 'selectSchedule'])->name('request.change.schedule');
      Route::post('change/destination', [MarineRequestController::class, 'changeDestination'])->name('request.change.destination');
      Route::get('schedule/create/{date}/{from}', [MarineRequestController::class, 'createSchedule'])->name('request.schedule.create');
      Route::put('undo-approve', [MarineRequestController::class, 'undoApprove'])->name('request.undo.approve');
      // Route::get('undo/approve/{id}', [MarineRequestController::class, 'undoApprove'])->name('request.undo.approve');

      // Route::put('undo-approve', [MarineRequestController::class, 'undoApprove'])->name('request.undo.approve');
   });

   // Route::prefix('schedule')->group(function () {
   //    Route::get('m/progress', [MarineScheduleController::class, 'progress'])->name('schedule.progress');
   //    Route::get('m/plan/{month}', [MarineScheduleController::class, 'plan'])->name('schedule.plan');

   //    Route::get('inbox', [MarineScheduleController::class, 'inbox'])->name('schedule.inbox');
      
   //    Route::get('order/{month}', [MarineScheduleController::class, 'order'])->name('schedule.order');
   //    Route::get('history', [MarineScheduleController::class, 'history'])->name('schedule.history');
   //    Route::get('create', [MarineScheduleController::class, 'create'])->name('schedule.create');
   //    Route::post('store', [MarineScheduleController::class, 'store'])->name('schedule.store');
   //    Route::get('edit/{schedule:id}', [MarineScheduleController::class, 'edit'])->name('schedule.edit');
   //    Route::put('update', [MarineScheduleController::class, 'update'])->name('schedule.update');
   //    Route::put('jetty/update', [MarineScheduleController::class, 'jettyUpdate'])->name('schedule.jetty.update');
   //    Route::get('delete/{schedule:id}', [MarineScheduleController::class, 'delete'])->name('schedule.delete');
   //    Route::get('send/{schedule:id}', [MarineScheduleController::class, 'send'])->name('schedule.send');
   //    Route::post('postpone', [MarineScheduleController::class, 'postpone'])->name('schedule.postpone');
   //    Route::get('remove/reqeust/{request:id}', [MarineScheduleController::class, 'removeRequest'])->name('schedule.remove.request');
   //    Route::get('reset/route/{schedule:id}', [MarineScheduleController::class, 'resetRoute'])->name('schedule.reset.route');
   //    Route::post('add/route', [MarineScheduleController::class, 'addRoute'])->name('schedule.add.route');
   //    Route::post('reorder/route', [MarineScheduleController::class, 'reorderRoute'])->name('schedule.reorder.route');
   //    Route::post('add/cargo', [MarineScheduleController::class, 'addCargo'])->name('schedule.add.cargo');
   // });
   Route::prefix('master/data/vessel')->group(function () {
      Route::get('index', [VesselController::class, 'index'])->name('vessel');
      Route::get('create', [VesselController::class, 'create'])->name('vessel.create');
      Route::post('store', [VesselController::class, 'store'])->name('vessel.store');
      Route::get('edit/{vessel:id}', [VesselController::class, 'edit'])->name('vessel.edit');
      Route::put('update', [VesselController::class, 'update'])->name('vessel.update');
      Route::get('delete/{vessel:id}', [VesselController::class, 'delete'])->name('vessel.delete');

      Route::get('crew', [VesselCrewController::class, 'index'])->name('vessel.crew');
   });
   Route::prefix('deviation')->group(function () {
      Route::get('send/{request:id}', [MarineDeviationController::class, 'send'])->name('schedule.send.deviation');
      Route::post('add', [MarineDeviationController::class, 'store'])->name('schedule.add.deviation');
      Route::get('delete/{deviation:id}', [MarineDeviationController::class, 'delete'])->name('schedule.delete.deviation');
   });

   Route::prefix('additional')->group(function () {
      Route::post('approve', [MarineAdditionalController::class, 'approve'])->name('schedule.approve.additional');
      Route::post('reject', [MarineAdditionalController::class, 'reject'])->name('schedule.reject.additional');
      Route::get('delete/{deviation:id}', [MarineDeviationController::class, 'delete'])->name('schedule.delete.deviation');
   });
});

Route::group(['middleware' => ['role:vessel|marine']], function () {
   Route::prefix('master/data/vessel')->group(function () {
      

      Route::get('crew', [VesselCrewController::class, 'index'])->name('vessel.crew');
      Route::get('crew/add', [VesselCrewController::class, 'add'])->name('vessel.crew.add');
      Route::post('crew/store', [VesselCrewController::class, 'store'])->name('vessel.crew.store');
   });
   Route::get("v/newsfeed", [HomeController::class, "newsVessel",])->name('vessel.newsfeed');
   Route::prefix('dsp/v/')->group(function () {
      Route::get("dash/main", [HomeController::class, "dspVessel",])->name('dsp.vessel');

      Route::prefix('request')->group(function () {
         Route::get('create', [VesselRequestController::class, 'create'])->name('request.vessel.create');
         Route::post('store', [VesselRequestController::class, 'store'])->name('request.vessel.store');
         Route::get('index', [VesselRequestController::class, 'index'])->name('request.vessel.index');
      });

      Route::prefix('schedule')->group(function () {
         Route::get('all', [VesselScheduleController::class, 'all'])->name('schedule.vessel.all');
         Route::get('progress', [VesselScheduleController::class, 'progress'])->name('schedule.progress.vessel');
         Route::get('history', [VesselScheduleController::class, 'history'])->name('schedule.history.vessel');
         // Route::get('complete/{id}', [VesselScheduleController::class, 'complete'])->name('schedule.vessel.complete');
         Route::put('complete', [VesselScheduleController::class, 'complete'])->name('schedule.vessel.complete');
         Route::put('revision', [VesselScheduleController::class, 'revision'])->name('schedule.revision');
      });
   });
   
   Route::prefix('vdr/v/')->group(function () {
      Route::get('dashboard', [VdrController::class, 'vdrVessel'])->name('vdr.create');
      
      Route::prefix('act')->group(function () {
         Route::get('main', [VdrController::class, 'vdrVessel'])->name('vdr.vessel');
      Route::get('create', [VdrController::class, 'vdrCreate'])->name('vdr.vessel.create');
      Route::get('history', [VdrController::class, 'history'])->name('vdr.history');
      Route::get('chart', [VdrController::class, 'chart'])->name('vdr.chart');
      Route::post('store', [VdrController::class, 'store'])->name('vdr.store');
      Route::post('delete', [VdrController::class, 'delete'])->name('vdr.delete');

      Route::get('edit/{vdr:id}', [VdrController::class, 'edit'])->name('vdr.edit');
      Route::put('update', [VdrController::class, 'update'])->name('vdr.update');
      Route::put('update/approval', [VdrController::class, 'updateApproval'])->name('vdr.update.approval');

      Route::post('store/activity', [VdrController::class, 'storeActivity'])->name('vdr.store.activity');
      Route::put('update/activity', [VdrController::class, 'updateActivity'])->name('vdr.update.activity');
      Route::delete('delete/activity', [VdrController::class, 'deleteActivity'])->name('vdr.delete.activity');

      // Crew
      Route::post('store/crew', [VdrController::class, 'storeCrew'])->name('vdr.store.crew');
      Route::delete('delete/crew', [VdrController::class, 'deleteCrew'])->name('vdr.delete.crew');
      Route::put('update/crew', [VdrController::class, 'updateCrew'])->name('vdr.update.crew');

      Route::get('template/crew', [VdrCrewController::class, 'templateExcel'])->name('vdr.template.crew');
      Route::post('import/crew', [VdrController::class, 'importCrew'])->name('vdr.import.crew');

      // 
      Route::put('update/cargo', [VdrController::class, 'updateCargo'])->name('vdr.update.cargo');
      Route::put('update/weather', [VdrController::class, 'updateWeather'])->name('vdr.update.weather');
      Route::put('update/hse', [VdrController::class, 'updateHse'])->name('vdr.update.hse');
      Route::put('update/engine', [VdrController::class, 'updateEngine'])->name('vdr.update.engine');

      Route::put('update/operating', [VdrController::class, 'updateOperating'])->name('vdr.update.operating');
      Route::put('update/periodic', [VdrPeriodicController::class, 'update'])->name('vdr.update.periodic');
      Route::put('update/special', [VdrPeriodicController::class, 'updateSpecial'])->name('vdr.update.special');

      // Route::get('delete/{employee:id}', [EmployeeController::class, 'delete'])->name('employee.delete');
      Route::get('release/{id}', [VesselVdrController::class, 'release'])->name('vdr.release');
      });
      
   });
   
});


// Level User Field
Route::group(['middleware' => ['role:logistic|drilling|department|mm']], function () {
   Route::prefix('dsp/u/')->group(function () {
      Route::get("dash/main/{month}/{year}", [HomeController::class, "dspUser",])->name('dsp.user');


      // Request
      Route::prefix('request')->group(function () {
         Route::get('create/m/d', [DepartmentRequestController::class, 'create'])->name('request.create');
         Route::get('create/s/d', [DepartmentRequestController::class, 'createSingle'])->name('request.create.single');
         Route::post('save', [DepartmentRequestController::class, 'save'])->name('request.save');
         Route::post('store', [DepartmentRequestController::class, 'storeImport'])->name('request.store');
         Route::post('store/new', [DepartmentRequestController::class, 'storeNew'])->name('request.store.new');
         Route::post('additional/store', [DepartmentRequestController::class, 'additionalStore'])->name('request.additional.store');
         Route::post('add', [DepartmentRequestController::class, 'add'])->name('request.add');
   
         Route::get('draft', [DepartmentRequestController::class, 'draft'])->name('request.draft');
         Route::get('progress', [DepartmentRequestController::class, 'progress'])->name('request.progress');
         Route::get('history', [DepartmentRequestController::class, 'history'])->name('request.history');
         Route::get('release/{id}', [DepartmentRequestController::class, 'release'])->name('request.release');
         Route::get('get/vessel/{id}', [DepartmentRequestController::class, 'getVessel'])->name('request.get.vessel');
         Route::post('change/vessel', [DepartmentRequestController::class, 'changeVessel'])->name('request.change.vessel');

         Route::get('parent/release/{parent:id}', [ParentRequestController::class, 'release'])->name('request.release.parent');
   
         Route::post('undo', [DepartmentRequestController::class, 'undo'])->name('request.undo');
         Route::get('delete/{request:id}', [DepartmentRequestController::class, 'delete'])->name('request.delete');
         Route::get('parent/delete/{parent:id}', [ParentRequestController::class, 'delete'])->name('request.delete.parent');
         Route::get('edit/{request:id}', [DepartmentRequestController::class, 'edit'])->name('request.edit');
         

         Route::get('parent/detail/{parent:id}', [ParentRequestController::class, 'detail'])->name('request.detail.parent');
      });
   });
   

   



   Route::prefix('schedule')->group(function () {
      Route::get('complete/{schedule:id}', [DepartmentScheduleController::class, 'complete'])->name('schedule.complete');
      // Route::get('vessel/complete/{schedule:id}', [VesselScheduleController::class, 'complete'])->name('schedule.vessel.complete');
      Route::post('additional/store', [DepartmentAdditionalController::class, 'store'])->name('schedule.add.additional');
      Route::get('additional/send/{request:id}', [DepartmentAdditionalController::class, 'send'])->name('schedule.send.additional');
   });
});

Route::group(['middleware' => ['role:logistic|department|marine|admin-logistic|vessel|mm']], function () {
   Route::prefix('cargo/item')->group(function () {
      Route::post('store', [CargoItemController::class, 'store'])->name('cargo.item.store');
      Route::post('import', [CargoItemController::class, 'storeImport'])->name('cargo.import');
      Route::get('delete/{id}', [CargoItemController::class, 'delete'])->name('cargo.delete');
      Route::put('update', [CargoItemController::class, 'update'])->name('cargo.update');

      Route::get('drop/{id}', [CargoItemController::class, 'drop'])->name('cargo.drop');
      Route::post('offloading', [CargoItemController::class, 'offloading'])->name('cargo.item.offloading');
   });
});

Route::group(['middleware' => ['role:drilling|department|marine']], function () {
   Route::prefix('passenger/item')->group(function () {
      Route::post('store', [PassengerItemController::class, 'store'])->name('passenger.item.store');
      Route::post('import', [PassengerItemController::class, 'storeImport'])->name('crew.import');
      Route::get('delete/{id}', [PassengerItemController::class, 'delete'])->name('passenger.delete');
      Route::put('update', [PassengerItemController::class, 'update'])->name('passenger.update');
      Route::post('add', [CrewController::class, 'add'])->name('crew.add');
   });
});

Route::group(['middleware' => ['role:vessel']], function () {
   Route::prefix('schedule')->group(function () {
      Route::get('vessel/{month}', [VesselScheduleController::class, 'index'])->name('schedule.vessel');
      Route::get('vessel/history/{month}', [VesselScheduleController::class, 'history'])->name('schedule.vessel.history');
      Route::post('update/status', [VesselScheduleController::class, 'updateStatus'])->name('schedule.update.status');
      Route::get('accept/{schedule:id}', [VesselScheduleController::class, 'accept'])->name('schedule.accept');

      Route::get('standby/{schedule:id}', [VesselScheduleController::class, 'standby'])->name('schedule.standby');
      Route::get('loading/{schedule:id}', [VesselScheduleController::class, 'loading'])->name('schedule.loading');
      Route::get('loading/complete/{schedule:id}', [VesselScheduleController::class, 'loadingEnd'])->name('schedule.loading.complete');
      Route::get('castoff/{schedule:id}', [VesselScheduleController::class, 'castoff'])->name('schedule.castoff');
      Route::get('fullaway/{schedule:id}', [VesselScheduleController::class, 'fullaway'])->name('schedule.fullaway');
      Route::get('arrive/{schedule:id}', [VesselScheduleController::class, 'arrive'])->name('schedule.arrive');
      Route::get('standby-dest/{schedule:id}', [VesselScheduleController::class, 'standbyDest'])->name('schedule.standby.dest');
      Route::get('unloading/{schedule:id}', [VesselScheduleController::class, 'unloading'])->name('schedule.unloading');
      Route::get('unloading/complete/{schedule:id}', [VesselScheduleController::class, 'unloadingEnd'])->name('schedule.unloading.complete');
      // Route::get('complete/{schedule:id}', [VesselScheduleController::class, 'complete'])->name('schedule.complete');
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
