<?php

namespace App\Http\Controllers;

use App\Models\CargoItem;
use App\Models\PassengerItem;
use App\Models\Request as ModelsRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
   public function request($id)
   {
      $today = Carbon::now();
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);

      $cargoItems = CargoItem::where('request_id', $request->id)->get();
      $passengerItems = PassengerItem::where('request_id', $request->id)->get();
      return view('pages.invoice.request', [
         'today' => $today,
         'request' => $request,
         'cargoItems' => $cargoItems,
         'passengerItems' => $passengerItems
      ])->with('i');
   }
}
