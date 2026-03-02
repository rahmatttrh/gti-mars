<?php

namespace App\Http\Controllers;

use App\Models\BargeSchedule;
use Illuminate\Http\Request;

class BargeScheduleController extends Controller
{
    public function store(Request $req){
        BargeSchedule::create([
           'intermilan_id' => $req->intermilanId,
           'barge_id' => $req->schedule_barge,
           'title' => $req->title,
           'note' => $req->note
        ]);
  
        return redirect()->back()->with('success', 'Schedule Barge berhasil ditambahkan');
     }
  
  
     public function delete($id){
        $bargeSchedule = BargeSchedule::find(dekripRambo($id));
        $bargeSchedule->delete();
  
        return redirect()->back()->with('success', 'Barge Schedule berhasil dihapus');
  
  
     }
  
  
  
     public function ajaxUpdate($id, Request $req){
        $bargeSchedule = BargeSchedule::find($id);
        $bargeSchedule->update([
           'barge_id' => $req->barge,
           'title' => $req->title,
           'note' => $req->note,
           
        ]);
  
        return response()->json([
           'success' => true,
           'result' => $bargeSchedule->id,
           'message' => 'Barge Schedule berhasil di ubah'
  
        ]);
  
  
  
     }
  
     public function ajaxUpdateBarge($id, Request $req){
        $bargeSchedule = BargeSchedule::find($id);
        $bargeSchedule->update([
           'barge_id' => $req->barge,
           'title' => $req->title,
           'note' => $req->note,
           
        ]);
  
        return response()->json([
           'success' => true,
           'result' => $bargeSchedule->id,
           'message' => 'Barge Schedule berhasil di ubah'
  
        ]);
  
  
  
     }
}
