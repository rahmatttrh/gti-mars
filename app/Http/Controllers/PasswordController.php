<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use App\Models\Vessel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
   public function index()
   {
      return view('auth.passwords.email');
   }

   public function resetUpdate(Request $req)
   {
      $vessel = Vessel::find($req->vessel);
      $user = User::where('username', $vessel->username)->first();

      $user->update([
         'password' => Hash::make('Mars@2026')
      ]);

      $vessel->update([
         'password_default' => null
      ]);

      return redirect()->back()->with('success', 'Password successfully updated');
   }

   public function update(Request $req)
   {
      // $req->validate([
      //    'password' => 'required|confirmed'
      // ]);

      $user = User::find(auth()->user()->id);
      if (!Hash::check($req->password_current, $user->password)) {
         return back()->withErrors([
            'password_current' => 'Password saat ini tidak sesuai.'
         ]);
      }

      $req->validate([
         'password' => [
            'required',
            'confirmed', // kalau pakai password_confirmation
            Password::min(12)
               ->mixedCase()   // harus ada huruf besar & kecil
               ->letters()     // minimal ada huruf
               ->numbers()     // harus ada angka
               ->symbols()     // harus ada karakter spesial
         ],
      ]);

      // dd('ok');
      $user = User::find(auth()->user()->id);
      // dd($user->name);
      $user->update([
         'password' => Hash::make($req->password)
      ]);


      $vessel = Vessel::where('username', $user->username)->first();
      $vessel->update([
         'password_default' => 'changed'
      ]);

      Log::create([
         'system' => 'VDR',
         'user_id' => auth()->user()->id,
         'vessel_id' => $vessel->id,
         'action' => 'Change Password',
         'desc' => '',
         'table' => 'vessels'
      ]);

      return redirect()->to('/')->with('Password successfully updated');
   }
}
