<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VesselCrew extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vessel(){
      return $this->belongsTo(Vessel::class);
    }

    public function designation(){
      return $this->belongsTo(Designation::class);
    }
}
