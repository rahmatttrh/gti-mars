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


   public function getSumHigh(){
      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrActivity::where('vdr_id', $this->vdr_id)->get() ;
      foreach($ops as $op){
         $time = $op->high;
         $array = explode('.', $op->high);
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

   public function getSumNormal(){
      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrActivity::where('vdr_id', $this->vdr_id)->get() ;
      foreach($ops as $op){
         $time = $op->normal;
         $array = explode('.', $op->normal);
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

      // if ($debugMinutes < 10) {
      //    $finalMinutes = '0' . $debugMinutes;
      // } else {
      //    $finalMinutes = $debugMinutes;
      // }
      // $finalHours  = sprintf('%02d', floor($debugHours));
   
      $final = $debugHours . '.' . $debugMinutes;
      
      return $final;


   }

   public function getSumSlow(){
      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrActivity::where('vdr_id', $this->vdr_id)->get() ;
      foreach($ops as $op){
         $time = $op->normal;
         $array = explode('.', $op->normal);
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
      // $finalHours  = sprintf('%02d', floor($debugHours));

      
   
      $final = $debugHours . '.' . $debugMinutes;
      return $final;


   }

   public function getSumManu(){
      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrActivity::where('vdr_id', $this->vdr_id)->get() ;
      foreach($ops as $op){
         $time = $op->manu;
         $array = explode('.', $op->manu);
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

      
   
      $final = $debugHours . '.' . $debugMinutes;
      return $final;


   }

   public function getSumIdle(){
      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrActivity::where('vdr_id', $this->vdr_id)->get() ;
      foreach($ops as $op){
         $time = $op->idle;
         $array = explode('.', $op->idle);
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

      
   
      $final = $debugHours . '.' . $debugMinutes;
      return $final;


   }

   public function getSumTow(){
      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrActivity::where('vdr_id', $this->vdr_id)->get() ;
      foreach($ops as $op){
         $time = $op->tow;
         $array = explode('.', $op->tow);
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

      
   
      $final = $debugHours . '.' . $debugMinutes;
      return $final;


   }

   public function getSumAh(){
      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrActivity::where('vdr_id', $this->vdr_id)->get() ;
      foreach($ops as $op){
         $time = $op->ah;
         $array = explode('.', $op->ah);
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

      
   
      $final = $debugHours . '.' . $debugMinutes;
      return $final;


   }

   public function getSumSb(){
      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrActivity::where('vdr_id', $this->vdr_id)->get() ;
      foreach($ops as $op){
         $time = $op->sb;
         $array = explode('.', $op->sb);
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

      
   
      $final = $debugHours . '.' . $debugMinutes;
      return $final;


   }
}
