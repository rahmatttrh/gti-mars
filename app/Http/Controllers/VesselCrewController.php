<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Vessel;
use App\Models\VesselCrew;
use Illuminate\Http\Request;

class VesselCrewController extends Controller
{
   public function index(){
      $vessel = Vessel::where('email', auth()->user()->email)->first();
      $crews = VesselCrew::where('vessel_id', $vessel->id)->get();
      return view('pages-stisla.vessel.crew', [
         'crews' => $crews
      ]);
   }

   public function add(){
      $designations = Designation::get();
      return view('pages-stisla.vessel.crew-add', [
         'designations' => $designations
      ]);
   }

   public function store(Request $req){
      $req->validate([]);
      $vessel = Vessel::where('email', auth()->user()->email)->first();

      VesselCrew::create([
         'vessel_id' => $vessel->id,
         'status' => 1,
         'shift' => $req->shift,
         'designation_id' => $req->designation,
         'name' => $req->name
      ]);

      return redirect()->route('vessel.crew')->with('success', 'Data Crew added');
   }
}
