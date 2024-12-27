<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Imports\CargosImport;
use App\Models\Cargo;
use App\Models\CargoItem;
use App\Models\Deflection;
use App\Models\Offloading;
use App\Models\Port;
use App\Models\Report;
use App\Models\ReportRequest;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CargoItemController extends Controller
{
   public function store(Request $r)
   {
      // dd($r->qty);
      $request = ModelsRequest::find($r->requestId);
      $user = User::find($request->user_id);
      $port = Port::where('email', $user->email)->first();
      $cargoItem = CargoItem::orderBy("created_at", "desc")->first();

      // dd($request->)
      // dd($port->name);
      if ($port) {
         $mtdThis = $port->mtd;
      } else {
         $mtdThis = '011';
      }

      if (isset($cargoItem)) {
         $mtd = $mtdThis . ($cargoItem->id + 1);
      } else {
         $mtd =  $mtdThis  . 1;
      }

      

      // dd($mtd);
      // $user = User::find()

      CargoItem::create([
         'type' => 'main',
         'status' => 0,
         'request_id' => $r->requestId,
         'no_doc' => $r->no_document,
         'mtd' => $mtd,
         'contract' => $r->contract,
         'description' => $r->desc,
         'qty' => $r->qty,
         'unit' => $r->unit,
         'size' => $r->size,
         'weight' => $r->weight,
         'remark' => $r->remark,
         'date' => $request->date,
         'user_id' => auth()->user()->id,
         'user_name' => auth()->user()->username
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

      // dd('ok');
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
      // dd('ok');
      $cargo = CargoItem::find($req->cargo);
      $cargo->update([
         // 'mtd' => $req->mtd,
         'description' => $req->desc,
         'contract' => $req->contract,
         'qty' => $req->qty,
         'unit' => $req->unit,
         'weight' => $req->weight,
         'remark' => $req->note
      ]);

      return redirect()->back()->with('success', 'Cargo Updated');
   }

   public function updateLogistic(Request $req){
      // dd('ok');
      $cargoItem = CargoItem::find($req->cargoId);
      // dd($cargoItem->desc);
      $cargoItem->update([
         'mtd' => $req->mtd,
         'contract' => $req->contract
      ]);
      return redirect()->back()->with('success', 'Data updated');

   }

   public function drop($id){
      // dd('ok');
      $cargoItem = CargoItem::find(dekripRambo($id));
      $schedule = Schedule::find($cargoItem->schedule_id);
      $lastreport = Report::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      $fixRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('status', 1)->orderBy('rank', 'asc')->get();
      $report = Report::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      $requests = ModelsRequest::where('schedule_id', $schedule->id)->where('status', '>=', 2)->where('status', '!=', 505)->orderBy('rank', 'asc')->get();
      $cargos = Cargo::where('schedule_id', $schedule->id)->get();
      $items = CargoItem::get();
      $routes = ScheduleRoute::where('schedule_id', $schedule->id)->get();

      return view('pages-stisla.schedule.drop', [
         'item' => $cargoItem,
         'schedule' => $schedule,
         'lastreport' => $lastreport,
         'fixRoutes' => $fixRoutes,
         'report' => $report,
         'cargos' => $cargos,
         'items' => $items,
         'requests' => $requests,
         'routes' => $routes
      ]);
   }

   public function offloading(Request $req)
   {
      $req->validate([]);
      // dd('oke');
      $cargoItem = CargoItem::find($req->cargoItem);
      // dd($cargoItem->id);
      $request = ModelsRequest::find($cargoItem->request_id);
      $schedule = Schedule::find($cargoItem->schedule_id);

      // if ($req->offloading > $cargoItem->qty) {
      //    dd('error');
      // }

      // dd('ok');

      $offloading = $req->offloading;
      $qty = $cargoItem->qty;

      $onboard = $qty - $offloading;

      $offloading = Offloading::create([
         'schedule_id' => $schedule->id,
         'request_id' => $request->id,
         'cargoitem_id' => $cargoItem->id,
         // 'employee_id' => auth()->user()->getEmployeeId(),
         'user_id' => auth()->user()->id,
         'qty' => $qty,
         'offloading' => $offloading,
         'onboard' => $onboard,
         'desc' => $req->desc
      ]);

      $cargoItem->update([
         'status' => 4,
         'offloading_id' => $offloading->id,
         // 'onboard' => $onboard
      ]);

      

      if ($req->destination && $onboard > 0) {
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
            // 'employee_id' => auth()->user()->getEmployeeId(),
            'user_id' => auth()->user()->id,
            'status_id' => 17,
            'port_id' => $cargoItem->request->destination_id
            // 'port_id' => auth()->user()->getPort()
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
            // 'employee_id' => auth()->user()->getEmployeeId(),
            'status_id' => 13,
            'port_id' => $req->port
         ]);
      } else {
         Report::create([
            'schedule_id' => $schedule->id,
            'vessel_id' => $schedule->vessel_id,
            'status_id' => 13,
            'port_id' => $req->port
         ]);
      }

      return redirect()->route('schedule.detail', enkripRambo($schedule->id))->with('success', 'Item successfully confirmed');
   }

   public function logApprove($id){
      // dd('ok');
      $item = CargoItem::find(dekripRambo($id));
      // dd($req->id);

      $cargo = Cargo::where('schedule_id', $item->schedule_id)->where('origin_id', $item->request->origin_id)->where('destination_id', $item->request->destination_id)->first();

      if ($cargo) {
         // dd('ada yg sama');
         $bcm = $cargo;

      } else {

         // dd('tidak ada yg sama');
         $cargo = Cargo::orderBy("created_at", "desc")->first();

      
         if (isset($cargo)) {
            $code = 'B00' . ($cargo->id + 1);
         } else {
            $code =  'B00'  . 1;
         }
         
         $bcm = Cargo::create([
            'code' => $code,
            'status' => 1,
            'schedule_id' => $item->schedule_id,
            'origin_id' => $item->request->origin_id,
            'destination_id' => $item->request->destination_id
         ]);

         
      }

      
      $item->update([
         'cargo_id' => $bcm->id,
         'status' => 1
      ]);
      

      return redirect()->back()->with('success', 'BCM Created');      
   }

   public function logReject(Request $req){
      $now = Carbon::now();
      $item = CargoItem::find($req->itemId);
      $vessel = $item->schedule->vessel->name;
      $item->update([
         'status' => 0,
         'schedule_id' => null,
         'cargo_id' => null,
         'undo' => $now,
         'reason' => $req->reason . ' ' . $vessel
      ]);

      return redirect()->back()->with('success', 'Cargo successfully rejected');
   }
}
