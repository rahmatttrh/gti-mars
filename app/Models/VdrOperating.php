<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VdrOperating extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function heading()
    {
        return $this->belongsTo(VdrOperatingHeader::class, 'heading_id');
    }


    public function getTotalHours($value){
      
      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
     
      $array = explode('.', $value);
      $hours = floor($value);
      $minutes = intval($array[1]);
      
      $debugHours += $hours;
      $debugMinutes += $minutes;
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
