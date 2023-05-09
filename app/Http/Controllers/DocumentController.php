<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
   public function manifest($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);

      return view('pages.document.manifest', [
         'schedule' => $schedule
      ]);
   }
}
