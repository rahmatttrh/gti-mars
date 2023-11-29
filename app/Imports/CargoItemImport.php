<?php

namespace App\Imports;

use App\Models\CargoItem;
use App\Models\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CargoItemImport implements ToModel, WithHeadingRow
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
        $req = Request::find($this->request);
        $req->update([
            'bcm' => $row['bcm']
        ]);
        // dd($row);
        return new CargoItem([
            'request_id'  => $req->id,
            'status' => 0,
            'bcm' => $row['bcm'],
            'mtd'    => $row['mtd'],
            'contract'    => $row['po'],
            'desc'    => $row['descriptive'],
            'qty'    => $row['qty'],
            'unit'    => $row['unit'],
            'weight' => $row['weight']
        ]);

        
    }
}
