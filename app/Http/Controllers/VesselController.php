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
         'kubikasi' => $req->kubikasi
      ]);

      return redirect()->back()->with('success', 'Vessel successfuly added');
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
}
