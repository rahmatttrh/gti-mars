<?php

namespace App\Imports;

use App\Models\PassengerItem;
use App\Models\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PassengerItemImport implements ToModel,WithHeadingRow
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

        if ($row['type'] == 'departure') {
            return new PassengerItem([
                'request_id' => $req->request,
                'type' => 'Depart',
                'name' => $row['name'],,
                'barcode' => $row['barcode'],,
                'department' => $row['department'],,
                'company' => $row['company'],,
                'desc' => $row['desc'],
            ]);
        }
        
    }
}
