<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deviation extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function schedule()
   {
      return $this->belongsTo(Schedule::class);
   }

   public function port()
   {
      return $this->belongsTo(Port::class);
   }

   public function report()
   {
      return $this->hasOne(DeviationReport::class);
   }
}
