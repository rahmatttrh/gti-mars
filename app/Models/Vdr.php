<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vdr extends Model
{
   use HasFactory;

   protected $guarded = [];

   public function rejectBy()
   {
      return $this->belongsTo(User::class, 'reject_by');
   }

   public function vessel()
   {
      return $this->belongsTo(Vessel::class);
   }

   public function operatings()
   {
      return $this->hasMany(VdrOperating::class);
   }

   public function times()
   {
      return $this->hasMany(VdrTimestamp::class);
   }

   public function calculateCrew(){
      $vdrCrews = VdrCrew::where('vdr_id', $this->id)->get();

      $totalCrew = count($vdrCrews->where('is_crew', 1));
      $totalPax = count($vdrCrews->where('is_crew', 0));
      
      // $vdrHseManhours = VdrHse::where('vdr_id', $this->id)->where('header_id', 7)->first();

      // $vdrHseManhours->update([
      //    ''
      // ]);

      $this->update([
         'crew_onduty' => $totalCrew,
         'crew_max' => $totalPax
      ]);


   }


   public function getTotalHours()
   {

      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $this->id)->get();
      // VdrOperating::where('vdr_id', $this->id)->sum('time')

      foreach ($ops as $op) {
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
      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));

      $final = $debugHours . '.' . $finalMinutes;
      return $final;
   }


   public function calculateCrew()
   {
      $vdrCrews = VdrCrew::where('vdr_id', $this->id)->get();

      $totalCrew = count($vdrCrews->where('is_crew', 1));
      $totalPax = count($vdrCrews->where('is_crew', 0));

      $this->update([
         'crew_onduty' => $totalCrew,
         'crew_max' => $totalPax
      ]);
   }

   public function customRound($number)
   {
      $decimal = $number - floor($number);
      if ($decimal >= 0.48) {
         return  ceil($number);
      } else {
         return floor($number);
      }
   }
}
