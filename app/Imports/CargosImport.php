<?php

namespace App\Imports;

use App\Models\CargoItem;
use App\Models\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CargosImport implements ToModel, WithHeadingRow, WithValidation
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
        return new CargoItem([
         'status' => 0,
         'request_id' => $requestUser->id,
         'bcm' => $row['bcm'],
         'mtd'    => $row['mtd'],
         'contract'    => $row['po'],
         'desc'    => $row['descriptive'],
         'qty'    => $row['qty'],
         'unit'    => $row['unit'],
         'weight' => $row['weight']
        ]);
    }

    public function rules(): array
    {
        return [
            'mtd' => 'required'
        ];
    }
}
