<?php

namespace App\Http\Controllers;

use App\Models\MainStrategy;
use Illuminate\Http\Request;

class MainStrategyController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([]);


        MainStrategy::create([
            'intermilan_id' => $req->intermilanId,
            'description' => $req->desc
        ]);

        return redirect()->back()->with('success', 'Main Strategy berhasil ditambahkan');
    }


    public function delete($id)
    {
        $mainStrategy = MainStrategy::find(dekripRambo($id));
        $mainStrategy->delete();

        return redirect()->back()->with('success', 'Main Strategy Schedule berhasil dihapus');
    }


    public function ajaxUpdate($id, Request $req)
    {
        $mainStrategy = MainStrategy::find($id);
        $mainStrategy->update([

            'description' => $req->desc,

        ]);

        return response()->json([
            'success' => true,
            'result' => $mainStrategy->id,
            'message' => 'Main Strategy berhasil di ubah'
        ]);
    }
}
