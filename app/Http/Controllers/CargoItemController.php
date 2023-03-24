<?php

namespace App\Http\Controllers;

use App\Models\CargoItem;
use Illuminate\Http\Request;

class CargoItemController extends Controller
{
   public function store(Request $r)
   {
      // dd($r->qty);
      CargoItem::create([
         'request_id' => $r->req,
         'no_doc' => $r->no_document,
         'desc' => $r->desc,
         'qty' => $r->qty,
         'unit' => $r->unit,
         'size' => $r->size,
         'weight' => $r->weight
      ]);
      return redirect()->back()->with('success', 'Cargo Item successfully added.');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $cargoItem = CargoItem::find($dekripId);
      $cargoItem->delete();
      return redirect()->back()->with('success', 'Item successfully deleted');
   }
}
