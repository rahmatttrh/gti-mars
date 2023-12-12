<?php

namespace App\Providers;

use App\Models\Request;
use App\Models\Schedule;
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
            $requests = Request::orderBy('date', 'asc')->get();
            $notif = false;
            foreach($requests as $req){
               if ($req->status == 1){
                  $notif = 'true';
               } 
            }
            // dd($notif);
            $view->with([
               'allSchedules' => $schedules,
               'notif' => $notif,
            ]);
         }
      );
   }
}
