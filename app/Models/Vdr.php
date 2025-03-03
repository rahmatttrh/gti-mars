<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vdr extends Model
{
   use HasFactory;

   protected $guarded = [];

   public function vessel(){
      return $this->belongsTo(Vessel::class);
   }

   public function operatings(){
      return $this->hasMany(VdrOperating::class);
   }

   public function times(){
      return $this->hasMany(VdrTimestamp::class);
   }

   public function getTotalHours(){
      
      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $this->id)->get() ;
      foreach($ops as $op){
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);
         
         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      $final = $debugHours . ':' . $debugMinutes;

      return $final;
   }

  
}
