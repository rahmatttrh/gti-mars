<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Port;
use Illuminate\Http\Request;

class RequestController extends Controller
{
   public function create()
   {
      $activities = Activity::get();
      $ports = Port::get();
      return view('pages.request.create', [
         'activities' => $activities,
         'ports' => $ports
      ]);
   }
}
