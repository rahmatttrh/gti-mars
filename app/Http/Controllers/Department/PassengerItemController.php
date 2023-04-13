<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\PassengerItem;
use Illuminate\Http\Request;

class PassengerItemController extends Controller
{
   public function storee(Request $r)
   {
      // dd($r->test);
      $test = $r->test;
      PassengerItem::create([
         'request_id' => $r->request,
         'number' => $r->number,
         // 'name' => $test
      ]);
      return redirect()->back()->with('success', 'Passenger Item successfully added.');
   }

   public function store(Request $req)
   {
      // dd($req->test);
      PassengerItem::create([
         'request_id' => $req->request_id,
         'number' => $req->number,
         'name' => $req->name
      ]);
      return redirect()->back()->with('success', 'Passenger Item successfully added.');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $cargoItem = PassengerItem::find($dekripId);
      $cargoItem->delete();
      return redirect()->back()->with('success', 'Item successfully deleted');
   }
}
