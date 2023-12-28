<?php

namespace App\Imports;

use App\Models\CargoItem;
use App\Models\Department;
use App\Models\Employee;
use App\Models\ParentRequest;
use App\Models\Port;
use App\Models\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CargoItemImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $parent;

    public function __construct($parent) 
    {
        $this->parent = $parent;
        
    }

    public function model(array $row)
    {

        // dd($row['destination']);
        $parent = ParentRequest::find($this->parent);
        // dd($parent->id);
        $employee = Employee::where('email', auth()->user()->email)->first();
        $department = Department::find($employee->department->id);
        $request = Request::orderBy("id", "desc")->first();
        $requests = Request::get();
      //   dd($request->code);
        $now = Carbon::today();

        if ($department->id == 2) {
            $type = 1;
        } elseif ($department->id == 3) {
            $type = 2;
        } else {
            $type = 3;
        }

        if (isset($request)) {
         // dd('ada : ' . $request->id);
            $code =
               "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
        } else {
            
            // dd($request->id);
            $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
        }
        // $req->update([
        //     'bcm' => $row['bcm']
        // ]);
        // dd($row);
        // $destination = Port::where('name', $row['destination'])->first();
        // $newRequest = Request::create([
        //     'parent_id' => $parent->id,
        //     'code' => $code,
        //     'type' => $type,
        //     'class' => 'main',
        //     'employee_id' => $employee->id,
        //     'department_id' => $department->id,
        //     'func' => $department->code,
        //     'activity_id' => $parent->activity_id,
        //     'date' => $parent->date,
        //     'origin_id' => $parent->origin_id,
        //     'destination_id' => $destination->id,
        //     'destination_name' => $row['destination'],
        //     'status' => 00
        // ]);
        // return new CargoItem([
        //     'request_id'  => $newRequest->id,
        //     'status' => 0,
        //     'bcm' => $row['bcm'],
        //     'mtd'    => $row['mtd'],
        //     'contract'    => $row['po'],
        //     'desc'    => $row['descriptive'],
        //     'qty'    => $row['qty'],
        //     'unit'    => $row['unit'],
        //     'weight' => $row['weight']
        // ]);

        // $newRequest->update([
        //     'bcm' => $row['bcm']
        // ]);


        $request = Request::where('parent_id', $parent->id)->where('destination_name', $row['destination'])->first();
        if ($request) {
            return new CargoItem([
                'request_id'  => $request->id,
                'status' => 0,
                'bcm' => $row['bcm'],
                'mtd'    => $row['mtd'],
                'contract'    => $row['po'],
                'desc'    => $row['descriptive'],
                'qty'    => $row['qty'],
                'unit'    => $row['unit'],
                'weight' => $row['weight']
            ]);
        } else {
            $destination = Port::where('name', $row['destination'])->first();
            $newRequest = Request::create([
                'parent_id' => $parent->id,
                'code' => $code,
                'type' => $type,
                'class' => 'main',
                'employee_id' => $employee->id,
                'department_id' => $department->id,
                'func' => $department->code,
                'activity_id' => $parent->activity_id,
                'date' => $parent->date,
                'origin_id' => $parent->origin_id,
                'destination_id' => $destination->id,
                'destination_name' => $row['destination'],
                'status' => 00
            ]);
            return new CargoItem([
                'request_id'  => $newRequest->id,
                'status' => 0,
                'bcm' => $row['bcm'],
                'mtd'    => $row['mtd'],
                'contract'    => $row['po'],
                'desc'    => $row['descriptive'],
                'qty'    => $row['qty'],
                'unit'    => $row['unit'],
                'weight' => $row['weight']
            ]);

            $newRequest->update([
                'bcm' => $row['bcm']
            ]);
        }
        
        // dd($req)
        // if (count($requests) > 0) {
        //     // dd($requests);
        //     foreach ($requests as $request) {
        //         if ($request->destination_name == $row['destination']) {
        //             // dd('ada tujuan sama');
        //             return new CargoItem([
        //                 'request_id'  => $request->id,
        //                 'status' => 0,
        //                 'bcm' => $row['bcm'],
        //                 'mtd'    => $row['mtd'],
        //                 'contract'    => $row['po'],
        //                 'desc'    => $row['descriptive'],
        //                 'qty'    => $row['qty'],
        //                 'unit'    => $row['unit'],
        //                 'weight' => $row['weight']
        //             ]);
        //         } else {
        //             // dd('blm ada tujuan yg sama');
        //             $destination = Port::where('name', $row['destination'])->first();
        //             $newRequest = Request::create([
        //                 'parent_id' => $parent->id,
        //                 'code' => $code,
        //                 'type' => $type,
        //                 'class' => 'main',
        //                 'employee_id' => $employee->id,
        //                 'department_id' => $department->id,
        //                 'func' => $department->code,
        //                 'activity_id' => $parent->activity_id,
        //                 'date' => $parent->date,
        //                 'origin_id' => $parent->origin_id,
        //                 'destination_id' => $destination->id,
        //                 'destination_name' => $row['destination'],
        //                 'status' => 00
        //             ]);
        //             return new CargoItem([
        //                 'request_id'  => $newRequest->id,
        //                 'status' => 0,
        //                 'bcm' => $row['bcm'],
        //                 'mtd'    => $row['mtd'],
        //                 'contract'    => $row['po'],
        //                 'desc'    => $row['descriptive'],
        //                 'qty'    => $row['qty'],
        //                 'unit'    => $row['unit'],
        //                 'weight' => $row['weight']
        //             ]);

        //             $newRequest->update([
        //                 'bcm' => $row['bcm']
        //             ]);
        //         }
        //     }
        // } else {
        //     // dd('ga ada request');
        //     $destination = Port::where('name', $row['destination'])->first();
        //     $newRequest = Request::create([
        //         'parent_id' => $parent->id,
        //         'code' => $code,
        //         'type' => $type,
        //         'class' => 'main',
        //         'employee_id' => $employee->id,
        //         'department_id' => $department->id,
        //         'func' => $department->code,
        //         'activity_id' => $parent->activity_id,
        //         'date' => $parent->date,
        //         'origin_id' => $parent->origin_id,
        //         'destination_id' => $destination->id,
        //         'destination_name' => $row['destination'],
        //         'status' => 00
        //     ]);
        //     return new CargoItem([
        //         'request_id'  => $newRequest->id,
        //         'status' => 0,
        //         'bcm' => $row['bcm'],
        //         'mtd'    => $row['mtd'],
        //         'contract'    => $row['po'],
        //         'desc'    => $row['descriptive'],
        //         'qty'    => $row['qty'],
        //         'unit'    => $row['unit'],
        //         'weight' => $row['weight']
        //     ]);

        //     $newRequest->update([
        //         'bcm' => $row['bcm']
        //     ]);
        // }

        // return new CargoItem([
        //     'request_id'  => $req->id,
        //     'status' => 0,
        //     'bcm' => $row['bcm'],
        //     'mtd'    => $row['mtd'],
        //     'contract'    => $row['po'],
        //     'desc'    => $row['descriptive'],
        //     'qty'    => $row['qty'],
        //     'unit'    => $row['unit'],
        //     'weight' => $row['weight']
        // ]);

        
    }

    public function rules(): array
    {
        return [
            'bcm' => 'required'
        ];
    }
}
