<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
   public function vessels(){
      $vessels = Vessel::get();
      return view('pages-urbix.vessels', [
         'vessels' => $vessels
      ]);
   }
}
