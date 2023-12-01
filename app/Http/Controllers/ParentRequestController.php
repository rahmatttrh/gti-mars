<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Department\DepartmentRequestController;
use App\Imports\CargoItemImport;
use App\Imports\PassengerItemImport;
use App\Mail\ApprovalEmail;
use App\Models\Activity;
use App\Models\ParentRequest;
use App\Models\Port;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class ParentRequestController extends Controller
{
   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      $parent = ParentRequest::find($dekripId);
      $activities = Activity::get();
      $ports = Port::get();
      // $requestHistories = RequestHistory::where('request_id', $request->id)->get();
      // $cargoItems = CargoItem::where('request_id', $request->id)->get();
      // $passengerItems = PassengerItem::where('request_id', $request->id)->get();
      // $schedules = Schedule::where('origin_id', $request->origin_id)->where('destination_id', $request->destination_id)->where('status', 0)->get();

      // $requests = ModelsRequest::where('parent_id', $parent->id)->first();
      // dd($requests->parent->code);
      // dd($parent->requests);
      return view('pages-stisla.request.parent', [
         'parent' => $parent,
         'activities' => $activities,
         'ports' => $ports
         
      ])->with('i');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $parent = ParentRequest::find($dekripId);
      $status = 0;
      foreach ($parent->requests as $request) {
         if ($request->status > 0) {
            $status = 1;
         }
      }

      if ($status == 0) {
         foreach ($parent->requests as $request) {
            $request->delete();
         }
         return redirect()->route('request.draft')->with('success', 'Master Request successfully deleted');
      } elseif ($status == 1) {
         return redirect()->back()->with('success', 'Failed, this Master Request has atleast one Request Activity On Progress');
      }
   }

   public function release($id)
   {
      $dekripId = dekripRambo($id);
      $parent = ParentRequest::find($dekripId);
      // dd($parent->id);
      foreach ($parent->requests as $request) {
         (new DepartmentRequestController)->release(enkripRambo($request->id));
         // $request->update([
         //    'status' => 01
         // ]);

         // $activityName = $request->activity->name . ' ' . $request->description;

         // $data = [
         //    'to' => 'Marine Department',
         //    'from' => $request->department->name . ' Department',
         //    'subject' => 'Request Activity Approval',
         //    'request' => $request,
         //    'body' => $activityName,
         //    'cargos' => $request->cargoItems,
         //    'link' => route('request.detail', enkripRambo($request->id))
         // ];

         // Mail::to("develop@ekanuri.com")->send(new ApprovalEmail($data));
         // Mail::to("rahmattrust@gmail.com")->send(new ApprovalEmail($data));
         // return redirect()->back()->with('success', 'Email has sent');
      }

      // $parent->update([
      //    'status' => 01
      // ]);




      return redirect()->route('request.progress')->with('success', 'Request Activity successfully send to marine');
   }

   public function addCargo(Request $req){
      // dd('add cargo');
      $parent = ParentRequest::find($req->parent);
      // dd($parent->id);
      Excel::import(new CargoItemImport($parent->id), $req->file('file-cargo'));

      return redirect()->back()->with('success', 'Cargo item added');
   }

   public function addCrew(Request $req){
      // dd('add crew');
      $parent = ParentRequest::find($req->parent);
      // dd($parent->id);
      Excel::import(new PassengerItemImport($parent->id, $req->destination), $req->file('file-crew'));

      return redirect()->back()->with('success', 'Crew item added');
   }
}
