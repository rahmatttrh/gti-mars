<?php

namespace App\Imports;

use App\Models\Status;
use App\Models\VdrCrew;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;


class CrewVdr implements ToModel
{
    private $vdr_id;

    public function __construct($vdr_id)
    {
        $this->vdr_id = $vdr_id;
    }
    public function model(array $row)
    {
        //index 0
        // 0 = Status
        // 1 = name
        // 2 = rank
        // 3 = Company

        if ($row[0] == 'crew' || $row[0] == 'passenger') {
            # code...
            if ($row[0] == 'crew') {
                # code...
                $is_crew = '1';
            } else {
                # code...
                $is_crew = '0';
            }

            // Simpan juga ke dalam ProductPlacement
            $createVdrCrew = VdrCrew::create([
                'vdr_id' => $this->vdr_id,
                'is_crew' => $is_crew,
                'name' => $row['1'], // Sesuaikan dengan kolom di Excel
                'rank' => $row['2'], // Sesuaikan dengan kolom di Excel
                'company' => $row['3'], // Sesuaikan dengan kolom di Excel
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Tambahkan 1 ke session untuk setiap barang yang berhasil diupdate
            $count = Session::get('count', 0) + 1;
            Session::put('count', $count);
        } else {
            # code...
            return null; // Tidak perlu membuat model baru
        }
    }
}
