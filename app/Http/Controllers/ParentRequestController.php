<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ParentRequest;
use App\Models\Port;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

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
      return view('pages.request.detail-parent', [
         'parent' => $parent,
         'activities' => $activities,
         'ports' => $ports
         // 'requestHistories' => $requestHistories,
         // 'schedules' => $schedules,
         // 'cargoItems' => $cargoItems,
         // 'passengerItems' => $passengerItems
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
}
