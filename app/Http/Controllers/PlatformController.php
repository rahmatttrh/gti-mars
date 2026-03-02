<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PlatformController extends Controller
{
   public function index()
   {
      $platforms = Platform::get();
      return view('pages.platform.index', [
         'platforms' => $platforms
      ])->with('i');
   }

   public function create()
   {
      return view('pages.platform.create');
   }

   public function store(Request $req)
   {
      $req->validate([]);

      $platform = Platform::create([
         'name' => $req->name,
         'system' => $req->system,
         'tagline' => $req->tagline,
         'email' => $req->email,
         'desc' => $req->desc,
         'logo' => request('logo') ? request()->file('logo')->store('images/logo') : '',
      ]);

      $user = User::create([
         'name' => $platform->name,
         'email' => $platform->email,
         'password' => Hash::make('12345678')
      ]);
      $user->assignRole('platform');

      return redirect()->route('platform')->with('success', 'Platform data has successfully added');
   }

   public function edit($id)
   {
      $dekripId = dekripRambo($id);
      $platform = Platform::find($dekripId);
      return view('pages.platform.edit', [
         'platform' => $platform
      ]);
   }

   public function update(Request $req)
   {
      $req->validate([]);

      $platform = Platform::find($req->platform);
      $user = User::where('email', $platform->email)->first();

      if (request('logo')) {
         Storage::delete($platform->logo);
         $logo = request()->file('logo')->store('images/logo');
      } elseif ($platform->logo) {
         $logo = $platform->logo;
      } else {
         $logo = null;
      }

      $platform->update([
         'name' => $req->name,
         'system' => $req->system,
         'tagline' => $req->tagline,
         'desc' => $req->desc,
         'logo' => $logo
      ]);

      $user->update([
         'name' => $req->name
      ]);
      $user->assignRole('platform');

      if (auth()->user()->hasRole('superuser')) {
         return redirect()->route('platform')->with('success', 'Platform data has successfully updated');
      } else {
         return redirect()->route('platform.detail', enkripRambo($platform->id))->with('success', 'Platform data has successfully updated');
      }
   }

   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      $platform = Platform::find($dekripId);
      $parties = Party::where('platform_id', $platform->id)->get();

      return view('pages.platform.detail', [
         'platform' => $platform,
         'parties' => $parties
      ]);
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $platform = Platform::find($dekripId);
      // dd($platform->name);
      if ($platform->logo) {
         Storage::delete($platform->logo);
      }

      $platform->delete();
      return redirect()->route('platform')->with('success', 'Platform data has successfully deleted');
   }

   public function parties($id)
   {
      $dekripId = dekripRambo($id);
      $platform = Platform::find($dekripId);

      $parties = Party::where('platform_id', $platform->id)->get();
      return view('pages.party.index', [
         'parties' => $parties
      ])->with('i');
   }
}
