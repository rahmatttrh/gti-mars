<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyBargeMove extends Model
{
    use HasFactory;
    protected $guarded = [];

   public function daily(){
      return $this->belongsTo(DailyReport::class, 'daily_id');
   }

   public function barge(){
      return $this->belongsTo(Port::class, 'barge_id');
   }

   public function vessel(){
      return $this->belongsTo(Vessel::class, 'vessel_id');
   }
}
