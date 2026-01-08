<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractDetail;
use App\Models\VdrOperatingHeader;
use App\Models\Vessel;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function store(Request $req)
    {

    
        $vessel = Vessel::find($req->vessel_id);

        $lastContract = Contract::where('vessel_id', $req->vessel_id)->orderBy('id', 'desc')->first();
        // dd($vessel);

        if ($lastContract) {
            $lastContract->status = 0; // Disable the last contract
            $lastContract->save();
        }

        

        $newContract =Contract::create([
            'vessel_id' => $req->vessel_id,
            'contract_number' => $req->contract_number,
            'type' => $req->contract_type,
            'start_date' => $req->contract_start,
            'end_date' => $req->contract_end,
            'status' => 1,
            'ipb' => $req->ipb,
            'func' => $req->func,
        ]);

        $operatingHeaders = VdrOperatingHeader::get();
        foreach ($operatingHeaders as $header) {
            ContractDetail::create([
                'contract_id' => $newContract->id,
                'heading_id' => $header->id,
                'speed' => 0,
                'contractual_fuel' => 0,
            ]);
        }

        return redirect()->back()->with('success', 'Contract created successfully.');
    }
}
