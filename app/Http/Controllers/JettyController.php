<?php

namespace App\Http\Controllers;

use App\Models\Jetty;
use Illuminate\Http\Request;

class JettyController extends Controller
{
   public function store(Request $req)
   {
      $req->validate([]);

      Jetty::create([
         'port_id' => $req->port,
         'name' => $req->name
      ]);

      return redirect()->back()->with('success', 'Jetty successfully added to this Port');
   }

   public function update(Request $req)
   {
      $req->validate([]);

      $jetty = Jetty::find($req->jetty);
      $jetty->update([
         'name' => $req->name
      ]);

      return redirect()->back()->with('success', 'Jetty successfully updated');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $jetty = Jetty::find($dekripId);

      if (count($jetty->schedules) >= 1) {
         // dd('ada');
         return redirect()->back()->with('warning', 'Failed! This jetty has a schedule');
      } else {
         // dd('kososng');
         $jetty->delete();
         return redirect()->back()->with('success', 'Jetty successfully deleted');
      }
   }
}
