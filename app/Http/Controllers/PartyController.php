<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PartyController extends Controller
{
   public  function index()
   {

      $parties = Party::get();
      return view('pages.party.index', [
         'parties' => $parties
      ])->with('i');
   }

   public function create()
   {
      $platforms = Platform::get();
      return view('pages.party.create', [
         'platforms' => $platforms
      ]);
   }

   public function store(Request $req)
   {
      $req->validate([]);

      Party::create([
         'name' => $req->name,
         'platform_id' => $req->platform,
         'type' => $req->type,
         'tagline' => $req->tagline,
         'email' => $req->email,
         'desc' => $req->desc,
         'logo' => request('logo') ? request()->file('logo')->store('images/logo') : '',
      ]);

      $user = User::create([
         'name' => $req->name,
         'email' => $req->email,
         'password' => Hash::make('12345678')
      ]);

      if ($req->type == 2) {
         $user->assignRole('supplier');
      } elseif ($req->type == 3) {
         $user->assignRole('tenant');
      } elseif ($req->type == 4) {
         $user->assignRole('retail');
      }

      return redirect()->route('party')->with('success', 'Party data has successfully added');
   }

   public function edit($id)
   {
      $dekripId = dekripRambo($id);
      $party = Party::find($dekripId);

      return view('pages.party.edit', [
         'party' => $party
      ]);
   }

   public function update(Request $req)
   {
      $req->validate([]);
      $party = Party::find($req->party);

      if (request('logo')) {
         Storage::delete($party->logo);
         $logo = request()->file('logo')->store('images/logo');
      } elseif ($party->logo) {
         $logo = $party->logo;
      } else {
         $logo = null;
      }

      $party->update([
         'name' => $req->name,
         'tagline' => $req->tagline,
         'desc' => $req->desc,
         'logo' => $logo
      ]);

      return redirect()->route('party')->with('success', 'Party data has successfully updated');
   }

   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      $party = Party::find($dekripId);

      return view('pages.party.detail', [
         'party' => $party
      ]);
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $party = Party::find($dekripId);

      if ($party->logo) {
         Storage::delete($party->logo);
      }
   }
}
