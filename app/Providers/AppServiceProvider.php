<?php

namespace App\Providers;

use App\Models\Request;
use App\Models\Schedule;
use App\Models\Vdr;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
   /**
    * Register any application services.
    *
    * @return void
    */
   public function register()
   {
      //
   }

   /**
    * Bootstrap any application services.
    *
    * @return void
    */
   public function boot()
   {
      view()->composer(
         'layouts.stisla.app',
         function ($view) {
            $schedules = Schedule::orderBy('date', 'asc')->get();
            $notifRequests = Request::where('status', 1)->orderBy('created_at', 'desc')->get();
            $notif = false;
            foreach($notifRequests as $req){
               if ($req->status == 1){
                  $notif = 'true';
               } 
            }
            // dd($notif);
            $view->with([
               'allSchedules' => $schedules,
               'notifRequests' => $notifRequests,
               'notif' => $notif,
            ]);
         }
      );

      view()->composer(
         'layouts.stisla.app-vdr',
         function ($view) {
            $notifVdrs = Vdr::where('status', 1)->orderBy('created_at', 'desc')->get();
            $vdrs = Vdr::orderBy('created_at', 'desc')->get();
            $notif = false;
            $notifSuptent = false;
            
            foreach($notifVdrs as $req){
               if ($req->status == 1){
                  $notif = 'true';
               } 
            }
            // dd($notif);
            $view->with([
               'notifVdrs' => $notifVdrs,
               'vdr' => $vdrs,
               'notif' => $notif,
            ]);
         }
      );

      view()->composer(
         'layouts.stisla.app-main',
         function ($view) {
            $schedules = Schedule::orderBy('date', 'asc')->get();
            $notifRequests = Request::where('status', 1)->orderBy('created_at', 'desc')->get();
            $notifVdrs = Vdr::where('status', 1)->orderBy('created_at', 'desc')->get();
            $vdrs = Vdr::orderBy('created_at', 'desc')->get();
            $notif = false;
            foreach($notifRequests as $req){
               if ($req->status == 1){
                  $notif = 'true';
               } 
            }
            // dd($notif);
            $view->with([
               'allSchedules' => $schedules,
               'notifRequests' => $notifRequests,
               'notifVdrs' => $notifVdrs,
               'vdrs' => $vdrs,
               'notif' => $notif,
            ]);
         }
      );

   }
}
