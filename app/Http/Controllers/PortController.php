<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Jetty;
use App\Models\Port;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PortController extends Controller
{
   public function index()
   {
      $ports = Port::orderBy('updated_at', 'desc')->get();

      return view('pages-stisla.master-data.port', [
         'ports' => $ports,
      ])->with('i');
   }

   public function store(Request $req)
   {
      $req->validate([
         'email' => 'unique:ports'
      ]);

      $port = Port::create([
         'name' => $req->name,
         'email' => $req->email,
         'type' => $req->type,
         'region' => $req->region
         // 'latitude' => $req->latitude,
         // 'longitude' => $req->longitude
      ]);

      $employee = Employee::create([
         'port_id' => $port->id,
         'name' => $port->name,
         'username' => $req->username,
         'email' => $req->email,
         'ekstensi' => 111
      ]);

      $user = User::create([
         'name' => $employee->name,
         'username' => $employee->username,
         'email' => $employee->email,
         'password' => Hash::make('12345678'),
      ]);
      $user->assignRole('department');


      // $user->assignRole('port');

      return redirect()->back()->with('success', 'Port saved.');
   }

   public function edit($id)
   {
      $dekripId = dekripRambo($id);
      $port = Port::find($dekripId);
      $ports = Port::orderBy('updated_at', 'desc')->get();

      return view('pages-stisla.master-data.port-edit', [
         'port' => $port,
         'ports' => $ports
      ])->with('i');
   }

   public function update(Request $req)
   {
      $req->validate([]);

      $port = Port::find($req->port);
      $port->update([
         'name' => $req->name,
         'email' => $req->email,
         'type' => $req->type,
         'region' => $req->region
         // 'latitude' => $req->latitude,
         // 'longitude' => $req->longitude
      ]);

      return redirect()->route('port')->with('success', 'Port successfully updated');
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
