<?php

namespace App\Http\Controllers;

use App\Models\Carrier;
use Illuminate\Http\Request;

class CarrierController extends Controller
{
   public function index()
   {
      $carriers = Carrier::get();
      return view('pages.carrier.index', [
         'carriers' => $carriers
      ])->with('i');
   }

   public function create()
   {
      return view('pages.carrier.create', []);
   }

   public function store(Request $req)
   {
      Carrier::create([
         'name' => $req->name
      ]);

      return redirect()->route('carrier')->with('success', 'Carrier data has successfully added');
   }

   public function edit($id)
   {
      $dekripId = dekripRambo($id);
      $carrier = Carrier::find($dekripId);

      return view('pages.carrier.edit', [
         'carrier' => $carrier
      ]);
   }

   public function update(Request $req)
   {
      $carrier = Carrier::find($req->carrier);
      $carrier->update([
         'name' => $req->name
      ]);

      return redirect()->route('carrier')->with('success', 'Carrier data has successfully updated');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $carrier = Carrier::find($dekripId);

      $carrier->delete();

      return redirect()->back()->with('success', 'Carrier data has successfully deleted');
   }
}
