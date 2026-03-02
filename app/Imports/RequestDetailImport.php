<?php

namespace App\Imports;

use App\Models\CargoItem;
use App\Models\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class RequestDetailImport implements ToCollection,  WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
    public function collection(Collection $rows)
    {
        // dd($row);

        foreach ($rows as $key => $row) {
            // dd($row);
            if ($row->filter()->isNotEmpty()) {
                $requestUser = Request::find($this->request);
                // dd($row['material']);
                CargoItem::create([
                    'status' => 0,
                    'request_id' => $requestUser->id,
                    // 'bcm' => $row['bcm'],
                    // 'mtd'    => $row['mtd'],
                    'contract'    => $row['contract'],
                    'description'    => $row['material'],
                    'qty'    => $row['qty'],
                    'unit'    => $row['unit'],
                    'weight' => $row['weight'],
                    'remark' => $row['remark'],
                ]);
            }
        }
    }
}
