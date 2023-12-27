<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Party;
use App\Models\Platform;
use App\Models\Port;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index()
   {
      $users = User::orderBy('created_at', 'desc')->get();
      $usersTotal = User::get();
      $ports = Port::get();
      return view('pages-stisla.master-data.user', [
         'totalUser' => count($usersTotal),
         'users' => $users,
         'ports' => $ports
      ])->with('i');
   }

   public function edit($id){
      $dekripId = dekripRambo($id);
      $user = User::find($dekripId);
      $ports = Port::get();

      $employee = Employee::where('email', $user->email)->first();
      $port = Port::find($employee->port_id);
      // if ($employee) {
      //    $port = Port::find($employee->port_id);
         
      // } else {
      //    $port = Port::where('email', $user->email)->first();
      // }
      return view('pages-stisla.master-data.user-edit', [
         'user' => $user,
         'employee' => $employee,
         'port' => $port,
         'ports' => $ports
      ]);
   }

   public function update(Request $req){
      $user = User::find($req->user);
      $employee = Employee::where('email', $user->email)->first();
      // dd($user->name);
      $user->update([
         'name' => $req->name,
         'username' => $req->username,
         'email' => $req->email
      ]);
      $employee->update([
         'name' => $req->name,
         'username' => $req->username,
         'email' => $req->email
      ]);

      return redirect()->route('user')->with('success', 'User data updated');
   }

   public function delete($id){
      $dekripId = dekripRambo($id);
      $user = User::find($dekripId);
      $employee = Employee::where('email', $user->email)->first();

      $employee->delete();
      $user->delete();

      return redirect()->back()->with('success', 'User deleted');

   }



   // public function update(Request $req)
   // {
   //    $user = User::find($req->user);

   //    if ($user->hasRole('platform')) {
   //       $platform = Platform::where('email', $user->email)->first();
   //       $platform->update([
   //          'email' => $req->email
   //       ]);
   //    } else {
   //       $party = Party::where('email', $user->email)->first();
   //       $party->update([
   //          'email' => $req->email
   //       ]);
   //    }

   //    $user->update([
   //       'email' => $req->email,
   //       'password' => $req->password ? Hash::make($req->password) : $user->password
   //    ]);

   //    return redirect()->back()->with('success', 'User data has successfully updated');
   // }
}
