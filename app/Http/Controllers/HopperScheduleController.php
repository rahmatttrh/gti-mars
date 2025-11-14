<?php

namespace App\Http\Controllers;

use App\Models\HopperSchedule;
use Illuminate\Http\Request;

class HopperScheduleController extends Controller
{
    public function store(Request $req){
        $req->validate([
  
        ]);
        
  
        HopperSchedule::create([
           'intermilan_id' => $req->intermilanId,
           'description' => $req->desc
        ]);
  
        return redirect()->back()->with('success', 'Hopper Schedule berhasil ditambahkan');
     }
  
  
     public function delete($id){
        $hopperSchedule = HopperSchedule::find(dekripRambo($id));
        $hopperSchedule->delete();
  
        return redirect()->back()->with('success', 'Hopper Schedule berhasil dihapus');
     }
  
  
     public function ajaxUpdate($id, Request $req){
        $hopperSchedule = HopperSchedule::find($id);
        $hopperSchedule->update([
           
           'description' => $req->desc,
           
        ]);
  
        return response()->json([
           'success' => true,
           'result' => $hopperSchedule->id,
           'message' => 'Hopper Schedule berhasil di ubah'
        ]);
  
     }
}
