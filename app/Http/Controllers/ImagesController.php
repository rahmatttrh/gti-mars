<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
   public function index(){
      $images = Images::get();
      return view('pages-stisla.images.index', [
         'images' => $images
      ])->with('i');
   }

   public function store(Request $req){
      
   // dd('oke');

      Images::create([
         'url' => request()->file('image')->store('images/images'),
         'desc' => $req->desc
      ]);

      return redirect()->back()->with('success', 'Image published');
   }

   public function delete($id){
      $dekripId = dekripRambo($id);
      $image = Images::find($dekripId);
      Storage::delete($image->url);
      $image->delete();

      return redirect()->back()->with('success', 'Image Deleted');

   }
}
