<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Port;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
   public function index()
   {
      $ports = Port::get();
      $departments = Department::get();
      $employees = Employee::get();
      return view('pages.employee.index', [
         'ports' => $ports,
         'departments' => $departments,
         'employees' => $employees
      ])->with('i');
   }

   public function store(Request $req)
   {
      $req->validate([]);
      $employee = Employee::create([
         'department_id' => $req->department,
         'port_id' => $req->port,
         'name' => $req->name,
         'email' => $req->email,
         'ekstensi' => $req->ekstensi
      ]);

      $user = User::create([
         'name' => $employee->name,
         'email' => $employee->email,
         'password' => Hash::make('12345678'),
      ]);

      // if ($req->department == 2) {
      //    $user->assignRole('logistic');
      // }
      $user->assignRole('department');

      $body = 'Selamat datang di DSP PHE';

      $data = [
         'to' => $employee->email,
         'from' => 'Marine Department',
         'subject' => 'Welcome',
         'body' => $body,
         'employee' => $employee,
         'link' => 'http://103.21.206.66:8005/'
      ];

      // Mail::to("rahmattrust@gmail.com")->send(new WelcomeEmail($data));
      Mail::to($employee->email)->send(new WelcomeEmail($data));


      return redirect()->back()->with('success', 'Employee data successfully added');
   }

   public function update(Request $req)
   {
      $employee = Employee::find($req->employee);
      $user = User::where('email', $employee)->first();
      $employee->update([
         'department_id' => $req->department,
         'port_id' => $req->port,
         'name' => $req->name,
         // 'email' => $req->email,
         'ekstensi' => $req->ekstensi
      ]);

      $user->update([
         'name' => $req->name
      ]);

      return redirect()->back()->with('success', 'Employee data successfully updated');
   }


   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $employee = Employee::find($dekripId);
      $user = User::where('email', $employee->email)->first();
      $employee->delete();
      $user->delete();


      return redirect()->back()->with('success', 'Employee data successfully deleted');
   }
}
