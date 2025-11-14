<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodstuffSchedule extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vessel(){
      return $this->belongsTo(Vessel::class, 'vessel_id');
    }
}
