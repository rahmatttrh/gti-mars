<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\Port;
use App\Models\Vessel;
use Illuminate\Http\Request;

class MarineMasterController extends Controller
{
    public function index(){
      $vessels = Vessel::get();
      $ports = Port::get();
      return view('pages-stisla.master-data.top.index', [
         'vessels' => $vessels,
         'ports' => $ports
      ])->with('i');
    }
}
