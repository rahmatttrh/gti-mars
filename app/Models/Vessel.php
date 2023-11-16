<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function schedules()
   {
      return $this->hasMany(Schedule::class);
   }

   public function department()
   {
      return $this->belongsTo(Department::class);
   }

   public function port()
   {
      return $this->belongsTo(Port::class);
   }

   public function vesselSchedule()
   {
      return $this->hasOne(ScheduleVessel::class);
   }
}
