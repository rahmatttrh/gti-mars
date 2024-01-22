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

   public function schedule(){
      return $this->belongsTo(Schedule::class);
   }

   public function surveillances(){
      return $this->hasMany(Surveillance::class);
   }

   public function histories(){
      return $this->hasMany(VesselHistory::class);
   }
   public function crews(){
      return $this->hasMany(Crew::class);
   }
   public function master(){
      $master = Crew::where('vessel_id', $this->id)->where('rank_id', 1)->first();
      return $master;
   }
   public function co(){
      $co = Crew::where('vessel_id', $this->id)->where('rank_id', 2)->first();
      return $co;
   }

   public function docs(){
      return $this->hasMany(Document::class);
   }
}
