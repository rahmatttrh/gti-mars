<?php

namespace App\Http\Controllers;

use App\Models\IpbSchedule;
use Illuminate\Http\Request;

class IpbScheduleController extends Controller
{
    public function ajaxUpdateVessel($id, Request $req)
    {
        $ipb = IpbSchedule::find($id);

        if ($req->vessel1 == 0) {
            $vessel1 = null;
        } else {
            $vessel1 = $req->vessel1;
        }

        if ($req->vessel2 == 0) {
            $vessel2 = null;
        } else {
            $vessel2 = $req->vessel2;
        }

        if ($req->vessel3 == 0) {
            $vessel3 = null;
        } else {
            $vessel3 = $req->vessel3;
        }

        $ipb->update([
            'vessel1' => $vessel1,
            'vessel2' => $vessel2,
            'vessel3' => $vessel3
        ]);



        return response()->json([
            'success' => true,
            'result' => $req->vessel1,
            'message' => 'IPB Schedule berhasil di ubah',

        ]);
    }
}
