<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Party;
use App\Models\Platform;
use App\Models\Port;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index()
   {
      $users = Employee::where('role', '!=', null)->orderBy('created_at', 'desc')->get();
      // dd(count($users));
      $users = User::get();
      // dd(count($users));
      $usersTotal = User::get();
      $ports = Port::get();
      return view('pages-stisla.master-data.user', [
         'totalUser' => count($usersTotal),
         'users' => $users,
         'ports' => $ports
      ])->with('i');
   }
   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      $user = User::find($dekripId);
      $employee = Employee::where('email', $user->email)->first();
      $histories = ModelsRequest::where('employee_id', $employee->id)->get();
      return view('pages-stisla.master-data.user-detail', [
         'user' => $user,
         'employee' => $employee,
         'histories' => $histories
      ])->with('i');
   }

   public function store(Request $req)
   {

      // dd($req->role);


      $req->validate([
         'name' => 'required',
         'email' => 'required',
         'username' => 'required',
         'level' => 'required'
      ]);

      // dd($req->role . '-' . $req->sistem);

      if ($req->func == 'Empty') {
         $func = null;
      } else {
         $func = $req->func;
      }

      if ($req->area == 'Empty') {
         $area = null;
      } else {
         $area = $req->area;
      }



      $employee = Employee::create([
         'name' => $req->name,

         'username' => $req->username,
         'email' => $req->email,
         // 'no_telp' => $req->no_telp,
         'role' => $req->level,
         'area' => $area,
         'func' => $func

      ]);

      $user = User::create([
         'name' => $employee->name,
         'email' => $employee->email,
         'username' => $employee->username,
         // 'password' => Hash::make('oses@2025'),
         'password' => Hash::make('mars@' . $req->username),
      ]);

      $user->assignRole($req->level);



      // $user->assignRole($req->role . '-' . $req->sistem);
      // if ($req->vdr) {
      //    $user->assignRole('admin-vdr');
      // } 

      // if ($req->dsp) {
      //    $user->assignRole('admin-dsp');
      // }



      return redirect()->back()->with('success', 'User added.');
   }

   // public function store(Request $req){

   //    dd($req->sistem);

   //    $req->validate([
   //       'name' => 'required',
   //       'email' => 'required',
   //       'username' => 'required'
   //    ]);

   //    $employee = Employee::create([
   //       'name' => $req->name,
   //       'username' => $req->username,
   //       'ekstensi' => $req->ekstensi,
   //       'email' => $req->email,
   //       'port_id' => $req->port
   //    ]);

   //    User::create([
   //       'name' => $employee->name,
   //       'username' => $employee->username,
   //       'email' => $employee->email,
   //       'password' => Hash::make('12345678'),
   //    ]);

   //    return redirect()->back()->with('success', 'User added.');
   // }

   public function edit($id)
   {
      $dekripId = dekripRambo($id);
      $user = Employee::find($dekripId);
      // $ports = Port::get();
      $users = Employee::where('role', '!=', null)->orderBy('created_at', 'desc')->get();

      // $employee = Employee::where('email', $user->email)->first();
      // $port = Port::find($employee->port_id);
      // if ($employee) {
      //    $port = Port::find($employee->port_id);

      // } else {
      //    $port = Port::where('email', $user->email)->first();
      // }
      return view('pages-stisla.master-data.user-edit', [
         'user' => $user,
         'users' => $users,
         // 'employee' => $employee,
         // 'port' => $port,
         // 'ports' => $ports
      ])->with('i');
   }

   public function update(Request $req)
   {
      $employee = Employee::find($req->user);
      $user = User::where('email', $employee->email)->first();
      // $employee = Employee::where('email', $user->email)->first();
      // dd($user->name);

      if ($req->func == 'Empty') {
         $func = null;
      } else {
         $func = $req->func;
      }

      if ($req->area == 'Empty') {
         $area = null;
      } else {
         $area = $req->area;
      }

      $employee->update([
         'name' => $req->name,
         'username' => $req->username,
         'email' => $req->email,
         'role' => $req->level,
         'area' => $area,
         'func' => $func
      ]);

      $user->update([
         'name' => $req->name,
         'username' => $req->username,
         'email' => $req->email,
      ]);
      // $employee->update([
      //    'name' => $req->name,
      //    'username' => $req->username,
      //    'email' => $req->email
      // ]);
      $user->assignRole($req->level);

      return redirect()->route('user')->with('success', 'User data updated');
   }

   public function exportPdf()
   {
      $users = User::whereIn('username', ['fm', 'suptent_project', 'suptent_wi', 'suptent_drilling'])->orderBy('created_at', 'desc')->get();
      $usersTotal = User::get();
      $ports = Port::get();

      $barges = Port::where('type', 'barge')->get();
      $bargesId = [];
      foreach ($barges as $barge) {
         $bargesId[] = $barge->id;
      }

      $users = User::whereIn('port_id', $bargesId)->get();

      return view('pages.document.user', [
         'users'  => $users,
      ]);
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $employee = Employee::find($dekripId);
      $user = User::where('email', $employee->email)->first();
      // $employee = Employee::where('email', $employee->email)->first();

      $user->delete();
      $employee->delete();

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
