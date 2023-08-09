<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\PassengerItem;
use Illuminate\Http\Request;

class CrewController extends Controller
{
   public function index()
   {
      $crews = Crew::orderBy('name', 'asc')->get();
      return view('pages.crew.index', [
         'crews' => $crews
      ])->with('i');
   }

   public function store(Request $req)
   {
      // dd('store');
      $req->validate([]);

      Crew::create([
         'name' => $req->name,
         'barcode' => $req->barcode,
         'department' => $req->department,
         'company' => $req->company,
         // 'desc' => $req->desc,
         'status' => 0
      ]);

      return redirect()->back()->with('success', 'Crew data successfully added');
   }

   public function update(Request $req)
   {
      $crew = Crew::find($req->crew);
      $crew->update([
         'name' => $req->name,
         'barcode' => $req->barcode,
         'department' => $req->department,
         'company' => $req->company
      ]);

      return redirect()->back()->with('success', 'Crew data successfully updated');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $crew = Crew::find($dekripId);

      $crew->delete();
      return redirect()->back()->with('success', 'Crew data successfully deleted');
   }

   public function add(Request $req)
   {

      // dd('add');
      $req->validate([]);

      $crew = Crew::create([
         'name' => $req->name,
         'barcode' => $req->barcode,
         'department' => $req->department,
         'company' => $req->company
      ]);

      PassengerItem::create([
         'request_id' => $req->requestId,
         'type' => $req->type,
         'crew_id' => $crew->id,
         'desc' => $req->desc
      ]);

      return redirect()->back()->with('success', 'Crew data successfully saved and added');
   }
}
