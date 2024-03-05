<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Imports\CargosImport;
use App\Models\CargoItem;
use App\Models\Deflection;
use App\Models\Offloading;
use App\Models\Report;
use App\Models\ReportRequest;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CargoItemController extends Controller
{
   public function store(Request $r)
   {
      // dd($r->qty);
      $request = ModelsRequest::find($r->requestId);

      CargoItem::create([
         'type' => 'main',
         'status' => 1,
         'request_id' => $r->requestId,
         'no_doc' => $r->no_document,
         'mtd' => $r->mtd,
         'contract' => $r->contract,
         'desc' => $r->desc,
         'qty' => $r->qty,
         'unit' => $r->unit,
         'size' => $r->size,
         'weight' => $r->weight,
         'remark' => $r->remark
      ]);

      $request->update([
         'total_size' => $request->cargoItems->sum('size'),
         'total_weight' => $request->cargoItems->sum('weight')
      ]);
      return redirect()->back()->with('success', 'Cargo Item successfully added.');
   }


   public function storeImport(Request $req){
      // dd($req->requestId);
      Excel::import(new CargosImport($req->requestId), $req->file('file-cargo'));

      return redirect()->back()->with('success', 'Manifest imported');
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

   public function update(Request $req){
      $cargo = CargoItem::find($req->cargo);
      $cargo->update([
         'mtd' => $req->mtd,
         'desc' => $req->desc,
         'contract' => $req->contract,
         'qty' => $req->qty,
         'unit' => $req->unit,
         'weight' => $req->weight
      ]);

      return redirect()->back()->with('success', 'Cargo Updated');
   }

   public function offloading(Request $req)
   {
      $req->validate([]);
      // dd('oke');
      $cargoItem = CargoItem::find($req->cargoItem);
      // dd($cargoItem->id);
      $request = ModelsRequest::find($cargoItem->request_id);
      $schedule = Schedule::find($request->schedule_id);

      $offloading = $req->offloading;
      $qty = $cargoItem->qty;

      $onboard = $qty - $offloading;



      $offloading = Offloading::create([
         'schedule_id' => $schedule->id,
         'request_id' => $request->id,
         'cargoitem_id' => $cargoItem->id,
         'employee_id' => auth()->user()->getEmployeeId(),
         'qty' => $qty,
         'offloading' => $offloading,
         'onboard' => $onboard,
         'desc' => $req->desc
      ]);

      $cargoItem->update([
         'status' => 2,
         'offloading_id' => $offloading->id,
         // 'onboard' => $onboard
      ]);

      if ($req->destination) {
         $deflection = Deflection::create([
            'request_id' => $request->id,
            'cargoitem_id' => $cargoItem->id,
            'qty' => $onboard,
            'port_id' => $req->destination,
            'desc' => $req->desc,

         ]);
         Report::create([
            'schedule_id' => $schedule->id,
            'vessel_id' => $schedule->vessel_id,
            'employee_id' => auth()->user()->getEmployeeId(),
            'status_id' => 17,
            'port_id' => auth()->user()->getPort()
         ]);

         $offloading->update([
            'deflection_id' => $deflection->id
         ]);
      }





      $con = true;
      foreach ($request->cargoItems as $item) {
         if ($item->status == 0) {
            $con = false;
         }
      }



      if ($con == true) {
         $request->update([
            'status' => 3
         ]);

         Report::create([
            'schedule_id' => $schedule->id,
            'vessel_id' => $schedule->vessel_id,
            'status_id' => 13,
            'port_id' => $req->port
         ]);

         ReportRequest::create([
            'request_id' => $request->id,
            'employee_id' => auth()->user()->getEmployeeId(),
            'status_id' => 13,
            'port_id' => auth()->user()->getPort()
         ]);
      } else {
         Report::create([
            'schedule_id' => $schedule->id,
            'vessel_id' => $schedule->vessel_id,
            'status_id' => 13,
            'port_id' => $req->port
         ]);
      }

      return redirect()->back()->with('success', 'Item successfully confirmed');
   }
}
