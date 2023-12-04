<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveillance extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vessel()
    {
        return $this->belongsTo(Vessel::class);
    }

    public function port(){
        return $this->belongsTo(Port::class);
    }

    public function cargos(){
        return $this->hasMany(SurveillanceCargo::class);
    }

    public function crews(){
        return $this->hasMany(SurveillanceCrew::class);
    }
}
