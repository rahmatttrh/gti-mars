<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Port;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

      if ($req->department == 2) {
         $user->assignRole('logistic');
      }


      return redirect()->back()->with('success', 'Employee data successfully added');
   }


   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $employee = Employee::find($dekripId);

      $employee->delete();

      return redirect()->back()->with('success', 'Employee data successfully deleted');
   }
}
