<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
      $this->middleware('auth');
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index()
   {
      $vessels = Vessel::get();
      $vessel3 = Vessel::paginate('3');
      return view('home', [
         'vessels' => $vessels,
         'vessel3' => $vessel3
      ]);
   }
}
