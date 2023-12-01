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
         'type' => $r->type,
         'name' => $r->name,
         'barcode' => $r->barcode,
         'department' => $r->department,
         'company' => $r->company,
         'desc' => $r->desc
         // 'name' => $test
      ]);
      return redirect()->back()->with('success', 'Passenger Item successfully added.');
   }

   public function store(Request $req)
   {
      // dd($req->test);
      // dd('store');
      PassengerItem::create([
         'request_id' => $req->request_id,
         'type' => $req->type,
         'crew_id' => $req->crew,
         // 'name' => $req->name,
         // 'barcode' => $req->barcode,
         // 'department' => $req->department,
         // 'company' => $req->company,
         'desc' => $req->desc
      ]);
      return redirect()->back()->with('success', 'Passenger Item successfully added.');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $passenger = PassengerItem::find($dekripId);
      $passenger->delete();
      return redirect()->back()->with('success', 'Passenger deleted');
   }

   public function update(Request $req){
      $passenger = PassengerItem::find($req->passenger);
      $passenger->update([
         'type' => $req->type,
         'name' => $req->name,
         'barcode' => $req->barcode,
         'department' => $req->department,
         'company' => $req->company,
         'desc' => $req->desc
      ]);

      return redirect()->back()->with('success', 'Passenger Updated');
   }
}
