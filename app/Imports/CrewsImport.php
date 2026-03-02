<?php

namespace App\Imports;

use App\Models\PassengerItem;
use App\Models\Request;
// use App\Models\PassengerItems;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithValidation;

class CrewsImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $request;

    public function __construct($request) 
    {
        $this->request = $request;
        
    }

    public function model(array $row)
    {
         $requestUser = Request::find($this->request);
        return new PassengerItem([
         'request_id' => $requestUser->id,
         'type' => $row['type'],
         'name' => $row['name'],
         'barcode' => $row['barcode'],
         'department' => $row['department'],
         'company' => $row['company'],
         'desc' => $row['description'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required'
        ];
    }
}
