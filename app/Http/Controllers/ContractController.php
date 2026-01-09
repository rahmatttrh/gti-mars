<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractDetail;
use App\Models\Vdr;
use App\Models\VdrHistory;
use App\Models\VdrOperatingHeader;
use App\Models\Vessel;
use Carbon\Carbon;
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

        $vdrs = Vdr::where('vessel_id', $req->vessel_id)->whereBetween('date', [$req->contract_start, $req->contract_end])->get();
        if ($vdrs->count() > 0) {
            // dd($vdrs);
            foreach ($vdrs as $vdr) {
                $date = Carbon::create($vdr->date);
                $year = $date->format('y');
                $year = $date->format('y');
                $month = $date->format('m');
                $day = $date->format('d');

                $awalan = $newContract->contract_number . "/" . str_replace(' ', '', strtoupper($vdr->vessel->name)) . '/';

                $vdrHistories = VdrHistory::where('vdr_id', $vdr->id)->get();
                $timestamp = $year  . $month  . $day;

                if (count($vdrHistories) > 0) {
                    $num = count($vdrHistories);
                } else {
                    $num = 0;
                }

                // Menggabungkan awalan dan $idPadded
                $hasil = $awalan . $timestamp . '/' . $num;
                $vdr->contract_number = $newContract->contract_number;
                $vdr->code = $hasil;
                $vdr->save();
            }
        }



        return redirect()->route('vessel.detail', enkripRambo($newContract->vessel_id))->with('success', 'Contract created successfully.' . $vdrs->count() . ' VDR updated.');
    }

    public function updateDetails(Request $request)
    {
        $contract = Contract::find($request->activeContractId);
        // dd($request->all());
        $contract->contract_number = $request->update_contract_number;
        $contract->type = $request->update_type;
        $contract->ipb = $request->update_ipb;
        $contract->func = $request->update_func;
        $contract->status = $request->update_status;
        $contract->start_date = $request->update_start_date;
        $contract->end_date = $request->update_end_date;
        $contract->save();

        foreach ($request->detailId as $index => $id) {
            ContractDetail::where('id', $id)->update([
                'speed' => $request->speed[$index],
                'contractual_fuel' => $request->contractual_fuel[$index],
            ]);
        }



        $vdrs = Vdr::where('vessel_id', $contract->vessel_id)->whereBetween('date', [$contract->start_date, $contract->end_date])->get();
        if ($vdrs->count() > 0) {
            // dd($vdrs);
            foreach ($vdrs as $vdr) {
                $date = Carbon::create($vdr->date);
                $year = $date->format('y');
                $year = $date->format('y');
                $month = $date->format('m');
                $day = $date->format('d');

                $awalan = $contract->contract_number . "/" . str_replace(' ', '', strtoupper($vdr->vessel->name)) . '/';

                $vdrHistories = VdrHistory::where('vdr_id', $vdr->id)->get();
                $timestamp = $year  . $month  . $day;

                if (count($vdrHistories) > 0) {
                    $num = count($vdrHistories);
                } else {
                    $num = 0;
                }

                // Menggabungkan awalan dan $idPadded
                $hasil = $awalan . $timestamp . '/' . $num;
                $vdr->contract = $contract->contract_number;
                $vdr->code = $hasil;
                $vdr->save();
            }
        }
        return redirect()->route('vessel.detail', enkripRambo($contract->vessel_id))->with('success', 'Contracts successfully updated.' . $vdrs->count() . ' VDR updated.');
    }

    public function delete($id)
    {
        $contract = Contract::find(dekripRambo($id));
        if ($contract) {
            // Delete associated contract details first
            ContractDetail::where('contract_id', $contract->id)->delete();
            // Then delete the contract
            $contract->delete();
            return redirect()->back()->with('success', 'Contract deleted successfully.');
        }
        return redirect()->back()->with('success', 'Contract successfully deleted.');
    }

   

}
