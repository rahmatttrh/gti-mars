<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
   public function index(){
      $feed = News::get()->first();
      return view('pages-stisla.news.index', [
         'feed' => $feed
      ])->with('i');
   }
   public function detail($id){
      $dekripId = dekripRambo($id);
      $feed = News::find($dekripId);
      return view('pages-stisla.news.detail', [
         'feed' => $feed
      ]);
   }

   public function update(Request $req){
      $feed = News::find($req->feed);

      if (request('image')) {
         Storage::delete($feed->image);
         $image = request()->file('image')->store('images/news');
      } elseif ($feed->image) {
         $image = $feed->image;
      } else {
         $image = null;
      }

      $feed->update([
         'title' => $req->title,
         'content' => $req->content,
         'image' => $image
      ]);

      return redirect()->to('/')->with('success', 'Article published');
   }

   public function store(Request $req){
      $req->validate([]);

      News::create([
         'user_id' => auth()->user()->id,
         'status' => 1,
         'title' => $req->title,
         'content' => $req->content,
         'image' => request('image') ? request()->file('image')->store('images/news') : '',
      ]);

      return redirect()->back()->with('success', 'Article published');
   }
}
