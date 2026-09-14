<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostSummaryController extends Controller
{
    public function detail($id){
        return view('pages-stisla.cost.detail', [

        ]);
    }
}
