<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceSchedule extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function barge(){
      return $this->belongsTo(Port::class, 'barge_id');
    }

    public function vessel(){
      return $this->belongsTo(Vessel::class, 'vessel_id');
    }
}
