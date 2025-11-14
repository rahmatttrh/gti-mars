<?php

namespace App\Http\Controllers;

use App\Models\InterWeather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InterWeatherController extends Controller
{
    public function update(Request $req){
        $weather = InterWeather::find($req->interWeatherId);
        if (request('file')) {
           Storage::delete($weather->picture);
           $file = request()->file('file')->store('intermilan/weather');
        } elseif ($weather->file) {
           $file = $weather->file;
        } else {
           $file = null;
        }
  
        $weather->update([
           'title' => $req->title,
           'file' => $file
        ]);
  
        return redirect()->back()->with('success', 'Data Prakiraan Cuaca brehasil di update');
     }
}
