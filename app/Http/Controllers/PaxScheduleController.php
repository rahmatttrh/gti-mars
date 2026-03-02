<?php

namespace App\Http\Controllers;

use App\Models\PaxSchedule;
use Illuminate\Http\Request;

class PaxScheduleController extends Controller
{
    public function store(Request $req){
        PaxSchedule::create([
           'intermilan_id' => $req->intermilanId,
           'vessel' => $req->vessel,
           'description' => $req->desc
        ]);
  
        return redirect()->back()->with('success', 'Jadwal Mobilisasi Pax berhasil ditambahkan');
     }
  
     public function delete($id){
        $paxSchedule = PaxSchedule::find(dekripRambo($id));
        $paxSchedule->delete();
        return redirect()->back()->with('success', 'Jadwal Mobilisasi Pax berhasil dihapus');
     }
  
  
  
     public function ajaxUpdate($id, Request $req){
        $paxSchedule = PaxSchedule::find($id);
        $paxSchedule->update([
           'vessel' => $req->vessel,
           'description' => $req->desc,
           
        ]);
  
        return response()->json([
           'success' => true,
           'result' => $paxSchedule->id,
           'message' => 'Pax Schedule berhasil di ubah'
  
        ]);
  
     }
}
