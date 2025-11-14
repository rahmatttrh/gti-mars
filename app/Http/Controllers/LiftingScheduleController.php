<?php

namespace App\Http\Controllers;

use App\Models\LiftingSchedule;
use Illuminate\Http\Request;

class LiftingScheduleController extends Controller
{
    public function store(Request $req){
        $req->validate([
  
        ]);
  
  
        LiftingSchedule::create([
           'status' => 1,
           'intermilan_id' => $req->intermilanId,
           'barge_id' => $req->barge,
           'vessel' => $req->vessel,
           'destination' => $req->destination,
           'volume_nominasi' => $req->vol_nominasi,
           'volume_actual' => $req->vol_actual,
           'volume_lifting_ppl' => $req->vol_lifting_ppl,
           'volume_lifting_nonppl' => $req->vol_lifting_nonppl,
           'ald_start' => $req->ald_start,
           'ald_end' => $req->ald_end,
           'complete_date' => $req->complete_date,
           'bl_no' => $req->bl_no,
           'remark' => $req->remark
        ]);
  
        return redirect()->back()->with('success', 'Lifting Schedule berhasil ditambahkan');
     }
  
     public function delete($id){
        $liftingSchedule = LiftingSchedule::find(dekripRambo($id));
        $liftingSchedule->delete();
  
        return redirect()->back()->with('success', 'Lifting Schedule berhasil dihapus');
  
  
     }
  
  
  
  
     public function ajaxUpdate($id, Request $req){
        $liftingSchedule = LiftingSchedule::find($id);
        $liftingSchedule->update([
           'vessel' => $req->vessel,
           'destination' => $req->destination,
           'volume_nominasi' => $req->volume_nominasi,
           'volume_actual' => $req->volume_actual,
           'volume_lifting_ppl' => $req->volume_lifting_ppl,
           'volume_lifting_nonppl' => $req->volume_lifting_nonppl,
           'bl_no' => $req->bl_no,
           'remark' => $req->remark,
        ]);
  
        return response()->json([
           'success' => true,
           'result' => $liftingSchedule->id,
           'message' => 'Lifting Schedule berhasil di ubah'
  
        ]);
  
  
  
     }
  
     public function ajaxUpdateBarge($id, Request $req){
        $liftingSchedule = LiftingSchedule::find($id);
        $liftingSchedule->update([
           'barge_id' => $req->barge,
           'ald_start' => $req->ald_start,
           'ald_end' => $req->ald_end,
           'complete_date' => $req->complete_date,
        ]);
  
        return response()->json([
           'success' => true,
           'result' => $liftingSchedule->id,
           'message' => 'Lifting Schedule Barge berhasil di ubah'
        ]);
  
     }
}
