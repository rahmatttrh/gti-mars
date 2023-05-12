<?php

namespace App\Http\Controllers;

use App\Models\Jetty;
use App\Models\Port;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PortController extends Controller
{
   public function index()
   {
      $ports = Port::get();

      return view('pages.port.index', [
         'ports' => $ports,

      ])->with('i');
   }

   public function store(Request $req)
   {
      $req->validate([
         'email' => 'unique:ports'
      ]);

      $employee = Port::create([
         'name' => $req->name,
         'email' => $req->email,
         'type' => $req->type,
         'latitude' => $req->latitude,
         'longitude' => $req->longitude
      ]);

      // $user = User::create([
      //    'name' => $employee->name,
      //    'email' => $employee->email,
      //    'password' => Hash::make('12345678'),
      // ]);


      // $user->assignRole('port');

      return redirect()->back()->with('success', 'Port successfully added');
   }

   public function update(Request $req)
   {
      $req->validate([]);

      $port = Port::find($req->port);
      $port->update([
         'name' => $req->name,
         'latitude' => $req->latitude,
         'longitude' => $req->longitude
      ]);

      return redirect()->back()->with('success', 'Port successfully updated');
   }

   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      $port = Port::find($dekripId);
      $jetties = Jetty::where('port_id', $port->id)->simplePaginate(5);
      $jettiesTotal = Jetty::where('port_id', $port->id)->get();
      return view('pages.port.detail', [
         'port' => $port,
         'jetties' => $jetties,
         'totalJetty' => count($jettiesTotal)
      ])->with('i');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $port = Port::find($dekripId);
      // dd($port);

      if (count($port->schedules) >= 1) {
         // dd('ada');
         return redirect()->back()->with('warning', 'Failed! This port has a schedule');
      } else {
         // dd('kososng');
         $port->delete();
         return redirect()->route('port')->with('success', 'Port successfully deleted');
      }
   }
}
