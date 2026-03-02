<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class ActivityController extends Controller
{
   public function index()
   {
      $activities = Activity::get();
      $types = Type::get();
      return view('pages.activity.index', [
         'activities' => $activities,
         'types' => $types
      ])->with('i');
   }

   public function store(Request $req)
   {
      $req->validate([
         'name' => 'required'
      ]);
      Activity::create([
         'type_id' => $req->type,
         'name' => $req->name,
         'desc' => $req->desc
      ]);

      return redirect()->back()->with('success', 'Activity successfully added');
   }

   public function update(Request $req)
   {
      $activity = Activity::find($req->activity);
      $activity->update([
         // 'type_id' => $req->type,
         'name' => $req->name,
         'desc' => $req->desc
      ]);

      return redirect()->back()->with('success', 'Activity successfully updated');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $activity = Activity::find($dekripId);

      $activity->delete();
      return redirect()->back()->with('success', 'Activity successfully deleted');
   }
}
