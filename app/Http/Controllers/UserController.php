<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index()
   {
      $users = User::orderBy('created_at', 'desc')->get();
      $usersTotal = User::get();
      return view('pages-stisla.master-data.user', [
         'totalUser' => count($usersTotal),
         'users' => $users
      ])->with('i');
   }

   public function update(Request $req)
   {
      $user = User::find($req->user);

      if ($user->hasRole('platform')) {
         $platform = Platform::where('email', $user->email)->first();
         $platform->update([
            'email' => $req->email
         ]);
      } else {
         $party = Party::where('email', $user->email)->first();
         $party->update([
            'email' => $req->email
         ]);
      }

      $user->update([
         'email' => $req->email,
         'password' => $req->password ? Hash::make($req->password) : $user->password
      ]);

      return redirect()->back()->with('success', 'User data has successfully updated');
   }
}
