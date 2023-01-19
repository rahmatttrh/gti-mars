<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use Illuminate\Http\Request;

class VesselController extends Controller
{
   public function index()
   {
      $vessels = Vessel::get();
      return view('pages.vessel.index', [
         'vessels' => $vessels
      ]);
   }

   public function store(Request $req)
   {
      $req->validate([]);

      Vessel::create([
         'name' => $req->name,
         'imo' => $req->imo,
         'type' => $req->type,
         'flag' => $req->flag,
         'owner' => $req->owner,
         'operator' => $req->operator,
         'deck_cargo_capacity' => $req->deck_cargo_capacity
      ]);

      return redirect()->back()->with('success', 'Vessel successfuly added');
   }

   public function update(Request $req)
   {
      $req->validate([]);

      $vessel = Vessel::find($req->vessel);
      $vessel->update([
         'name' => $req->name,
         'imo' => $req->imo,
         'type' => $req->type,
         'flag' => $req->flag,
         'owner' => $req->owner,
         'operator' => $req->operator,
         'deck_cargo_capacity' => $req->deck_cargo_capacity
      ]);
      return redirect()->back()->with('success', 'Vessel successfuly updated');
   }

   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      // dd($dekripId);
      $vessel = Vessel::find($dekripId);
      return view('pages.vessel.detail', [
         'vessel' => $vessel
      ]);
   }

   public function delete($id)
   {
      // dd('okeee');
      $dekripId = dekripRambo($id);
      $vessel = Vessel::find($dekripId);
      // dd(count($vessel->schedules));

      if (count($vessel->schedules) >= 1) {
         // dd('adaa');
         return redirect()->back()->with('warning', 'Failed! This vessel has a schedule');
      } else {
         // dd('kosong');
         $vessel->delete();
         return redirect()->route('vessel')->with('success', 'Vessel successfully deleted');
      }
   }
}
