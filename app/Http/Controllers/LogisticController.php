<?php

namespace App\Http\Controllers;

use App\Models\Logistic;
use Illuminate\Http\Request;

class LogisticController extends Controller
{
   public function index()
   {
      $logistics = Logistic::orderBy('created_at', 'desc')->simplePaginate(5);
      $logisticsTotal = Logistic::get();
      return view('pages.logistic.index', [
         'logistics' => $logistics,
         'totalLogistic' => count($logisticsTotal),
         'no' => 1
      ])->with('i');
   }

   public function store(Request $req)
   {
      $req->validate([]);
      Logistic::create([
         'name' => $req->name,
         'weight' => $req->weight,
         'size' => $req->size
      ]);

      return redirect()->back()->with('success', 'Logistic successfully added');
   }

   public function update(Request $req)
   {
      $req->validate([]);
      $logistic = Logistic::find($req->logistic);
      $logistic->update([
         'name' => $req->name,
         'weight' => $req->weight,
         'size' => $req->size
      ]);
      return redirect()->back()->with('success', 'Logistic successfully updated');
   }
}
