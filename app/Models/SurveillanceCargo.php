<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveillanceCargo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function surveillance(){
        return $this->belongsTo(Surveillance::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function origin(){
        return $this->belongsTo(Port::class);
    }

    public function destination(){
        return $this->belongsTo(Port::class);
    }


}
