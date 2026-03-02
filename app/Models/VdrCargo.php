<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VdrCargo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function heading()
    {
        return $this->belongsTo(VdrCargoHeading::class, 'heading_id');
    }

    public function vdr()
    {
        return $this->belongsTo(Vdr::class, 'vdr_id');
    }



    public function getDataForDateRange($vesselId, $startDate, $endDate)
    {


        // Konversi string tanggal ke objek DateTime
        $startDate = new DateTime($startDate);
        $endDate = new DateTime($endDate);


        $datas = array();
        $index = 0;

        // Tambahkan satu hari pada setiap iterasi
        for ($date = clone $startDate; $date <= $endDate; $date->modify('+1 day')) {
            // echo $date->format('Y-m-d') . "<br>";
            $tanggal = $date->format('Y-m-d');

            $cargo = DB::selectOne(
                "SELECT vc.consumption AS consumption FROM vdr_cargos vc
                JOIN vdrs v
                ON vc.vdr_id = v.id
                WHERE vc.heading_id = '1' AND v.vessel_id = '$vesselId' AND v.date = '$tanggal'
                                    
            "
            );


            if ($cargo) {
                # code...
                $consumption  = $cargo->consumption;
            } else {
                $consumption  = 0;
            }


            $datas[$index] = [
                'date' => strval($tanggal),
                'value' => $consumption
            ];

            $index++;
        }

        return $datas;
    }
}
