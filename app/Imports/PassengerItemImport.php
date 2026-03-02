<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Employee;
use App\Models\ParentRequest;
use App\Models\PassengerItem;
use App\Models\Port;
use App\Models\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PassengerItemImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $parent;
    private $destination;

    public function __construct($parent, $destination) 
    {
        $this->parent = $parent;
        $this->destination = $destination;
        
    }

    public function model(array $row)
    {
        // dd($this->destination);
        $destination = Port::find($this->destination);
        // dd($this->destination);
        $parent = ParentRequest::find($this->parent);
        $employee = Employee::where('email', auth()->user()->email)->first();
        $department = Department::find($employee->department->id);
        $request = Request::orderBy("created_at", "desc")->first();
        $now = Carbon::today();

        if ($department->id == 2) {
            $type = 1;
        } elseif ($department->id == 3) {
            $type = 2;
        } else {
            $type = 3;
        }

        if (isset($request)) {
            $code =
               "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
        } else {
            $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
        }
        if ($row['type'] == 'Departure') {
            $crewType = 'Depart';
        } elseif ($row['type'] == 'Return') {
            $crewType = 'Return';
        }

        $request = Request::where('parent_id', $parent->id)->where('activity_id', 2)->where('destination_id', $this->destination)->first();
        if ($request) {
            return new PassengerItem([
                'request_id' => $request->id,
                'type' => $crewType,
                'name' => $row['name'],
                'barcode' => $row['barcode'],
                'department' => $row['department'],
                'company' => $row['company'],
                'desc' => $row['description'],
            ]);
        } else {
            $newRequest = Request::create([
                'parent_id' => $parent->id,
                'code' => $code,
                'type' => $type,
                'class' => 'main',
                'employee_id' => $employee->id,
                'department_id' => $department->id,
                'func' => $department->code,
                'activity_id' => 2,
                'date' => $parent->date,
                'origin_id' => $parent->origin_id,
                'destination_id' => $this->destination,
                'destination_name' => $destination->name,
                'status' => 00
            ]);

            return new PassengerItem([
                'request_id' => $newRequest->id,
                'type' => $crewType,
                'name' => $row['name'],
                'barcode' => $row['barcode'],
                'department' => $row['department'],
                'company' => $row['company'],
                'desc' => $row['description'],
            ]);
        }



        

        
        
    }
}
