<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
{
   public function index()
   {
      $ports = Port::get();
      return view('pages.port.index', [
         'ports' => $ports
      ]);
   }
}
