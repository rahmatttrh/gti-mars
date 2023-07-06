<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\CargoItem;
use App\Models\Offloading;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class CargoItemController extends Controller
{
   public function store(Request $r)
   {
      // dd($r->qty);
      $request = ModelsRequest::find($r->req);

      CargoItem::create([
         'status' => 1,
         'request_id' => $r->req,
         'no_doc' => $r->no_document,
         'desc' => $r->desc,
         'qty' => $r->qty,
         'unit' => $r->unit,
         'size' => $r->size,
         'weight' => $r->weight,
         'remark' => $r->remark
      ]);

      $request->update([
         'total_size' => $request->total_size + $r->size,
         'total_weight' => $request->total_weight + $r->weight
      ]);
      return redirect()->back()->with('success', 'Cargo Item successfully added.');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $cargoItem = CargoItem::find($dekripId);
      $request = ModelsRequest::find($cargoItem->request_id);

      $request->update([
         'total_size' => $request->total_size - $cargoItem->size,
         'total_weight' => $request->total_weight -  $cargoItem->weight
      ]);
      $cargoItem->delete();
      return redirect()->back()->with('success', 'Item successfully deleted');
   }

   public function offloading(Request $req)
   {
      $req->validate([]);

      $cargoItem = CargoItem::find($req->cargoItem);
      $offloading = $req->offloading;
      $qty = $cargoItem->qty;

      $onboard = $qty - $offloading;

      $offloading = Offloading::create([
         'cargoitem_id' => $cargoItem->id,
         'employee_id' => auth()->user()->getEmployeeId(),
         'qty' => $qty,
         'offloading' => $offloading,
         'onboard' => $onboard
      ]);

      $cargoItem->update([
         'status' => 2,
         'offloading_id' => $offloading->id,
         // 'onboard' => $onboard
      ]);

      return redirect()->back()->with('success', 'Item successfully confirmed');
   }
}
