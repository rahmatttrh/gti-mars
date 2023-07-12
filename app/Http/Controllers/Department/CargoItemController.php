<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\CargoItem;
use App\Models\Offloading;
use App\Models\Report;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
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
      $request = ModelsRequest::find($cargoItem->request_id);
      $schedule = Schedule::find($request->schedule_id);

      $offloading = $req->offloading;
      $qty = $cargoItem->qty;

      $onboard = $qty - $offloading;

      $offloading = Offloading::create([
         'cargoitem_id' => $cargoItem->id,
         'employee_id' => auth()->user()->getEmployeeId(),
         'qty' => $qty,
         'offloading' => $offloading,
         'onboard' => $onboard,
         // 'desc' => $req->desc
      ]);

      $cargoItem->update([
         'status' => 2,
         'offloading_id' => $offloading->id,
         // 'onboard' => $onboard
      ]);

      $con = true;
      foreach ($request->cargoItems as $item) {
         if ($item->status == 1) {
            $con = false;
         }
      }

      if ($con == true) {
         // dd('true');
         $request->update([
            'status' => 3
         ]);
         $schedule->update([
            'status' => 2
         ]);

         Report::create([
            'schedule_id' => $schedule->id,
            'vessel_id' => $schedule->vessel_id,
            'status_id' => 9,
            'port_id' => $req->port
         ]);
      } else {
         // dd('false');
      }

      return redirect()->back()->with('success', 'Item successfully confirmed');
   }
}
