<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Log;
use App\Models\Vdr;
use App\Models\VdrTimestamp;
use App\Models\Vessel;
use Illuminate\Http\Request;

class VdrComanController extends Controller
{

    public function approve(Request $req)
    {

        $vdr = Vdr::find($req->vdr);

        $vessel = Vessel::find($vdr->vessel_id);

        $status = 2;

        //   dd($req->coman);


        // dd($status);
        $vdr->update([
            'status' => $status,
            'title4' => 'Company Man',
            'timestamp4' => now(),
            'name4' => $req->coman,
        ]);



        VdrTimestamp::create([
            'vdr_id' => $vdr->id,
            'status' => $status,
            'user_id' => auth()->user()->id
        ]);

        Log::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,

            'action' => $req->coman . ' Approve VDR',
            'vdr_id' => $vdr->id,
            'desc' => 'Coman',
            'table' => 'vdrs'
        ]);
        // dd()

        // $emailController = new EmailController();
        // $emailController->approvalVdrSuptent(enkripRambo($vdr->id));

        return redirect()->to('/')->with('success', 'VDR Company Man Approved');
    }



    public function rejectList()
    {
        $employee = Employee::where('email', auth()->user()->email)->first();
        $nonPoVesselIds = Vessel::where('contract_type', 'Non PO')
            ->pluck('id')
            ->toArray();

        $vdrComans = Vdr::whereIn('vessel_id', $nonPoVesselIds)->where('status', 5)->orderBy('updated_at', 'desc')->get();
        $vdrRejects = Vdr::whereIn('vessel_id', $nonPoVesselIds)->whereIn('status',  [101, 202, 303])->orderBy('updated_at', 'desc')->get();
        $vdrHistories = Vdr::whereIn('vessel_id', $nonPoVesselIds)->whereIn('status', [2, 3, 4])->orderBy('updated_at', 'desc')->get();

        return view('main-coman', [
            'title' => 'reject',
            'employee' => $employee,
            'vdrs' => $vdrRejects,
            'vdrComans' => $vdrComans,
            'vdrRejects' => $vdrRejects,
            'vdrHistories' => $vdrHistories

        ])->with('i');
    }

    public function historyList()
    {
        $employee = Employee::where('email', auth()->user()->email)->first();
        $nonPoVesselIds = Vessel::where('contract_type', 'Non PO')
            ->pluck('id')
            ->toArray();

        $vdrComans = Vdr::whereIn('vessel_id', $nonPoVesselIds)->where('status', 5)->orderBy('updated_at', 'desc')->get();
        $vdrRejects = Vdr::whereIn('vessel_id', $nonPoVesselIds)->whereIn('status',  [101, 202, 303])->orderBy('updated_at', 'desc')->get();
        $vdrHistories = Vdr::whereIn('vessel_id', $nonPoVesselIds)->whereIn('status', [2, 3, 4])->orderBy('updated_at', 'desc')->get();

        return view('main-coman', [
            'title' => 'history',
            'employee' => $employee,
            'vdrs' => $vdrHistories,
            'vdrComans' => $vdrComans,
            'vdrRejects' => $vdrRejects,
            'vdrHistories' => $vdrHistories

        ])->with('i');
    }
}
