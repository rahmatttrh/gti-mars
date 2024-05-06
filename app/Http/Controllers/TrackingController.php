<?php

namespace App\Http\Controllers;

use App\Models\CargoItem;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
   public function index(){
      $cargos = CargoItem::get();
      // dd($cargos);
      return view('pages-stisla.tracking.index', [
         'cargos' => $cargos
      ]);
   }
}
