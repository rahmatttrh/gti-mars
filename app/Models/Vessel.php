<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function office()
   {
      return $this->belongsTo(Office::class);
   }

   public function getTotalVdrs($month, $year)
   {
      $vdrVessels = Vdr::where('vessel_id', $this->id)
         ->whereMonth('date', $month)
         ->whereYear('date', $year)
         ->where('status', 4)
         ->get();

      // dd($vdrVessels);

      $totalVdrs = count($vdrVessels);
      return $totalVdrs;
   }

   // public function getVdrs()
   // {
   //    $to = Carbon::now();
   //    $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-08-01', $to])->where('status', '>', 0)->get();
   //    return $vdrs;
   // }

   // public function getRejectVdrs()
   // {
   //    $to = Carbon::now();
   //    $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-08-01', $to])->whereIn('status', [101, 202, 303])->get();
   //    return $vdrs;
   // }
   // public function getPetVdrs()
   // {
   //    $to = Carbon::now();
   //    $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-08-01', $to])->whereIn('status', [1])->get();
   //    return $vdrs;
   // }

   // public function getMarineVdrs()
   // {
   //    $to = Carbon::now();
   //    $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-08-01', $to])->whereIn('status', [2])->get();
   //    return $vdrs;
   // }

   // public function getSuptentVdrs()
   // {
   //    $to = Carbon::now();
   //    $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-08-01', $to])->whereIn('status', [3])->get();
   //    return $vdrs;
   // }

   // public function getProgressVdrs()
   // {
   //    $to = Carbon::now();
   //    $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-08-01', $to])->whereNotIn('status', [0, 4, 101, 202, 303])->get();
   //    return $vdrs;
   // }

   // public function getCompleteVdrs()
   // {
   //    $to = Carbon::now();
   //    $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-08-01', $to])->whereIn('status', [4])->get();
   //    return $vdrs;
   // }

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

   public function getVdrs()
   {
      $to = Carbon::now();
      $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-09-16', $to])->get();
      return $vdrs;
   }

   public function getDraftVdrs()
   {
      $to = Carbon::now();
      $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-09-16', $to])->whereIn('status', [0])->get();
      return $vdrs;
   }

   public function getVdrLast()
   {
      $to = Carbon::now();
      $vdr = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-09-16', $to])->orderBy('release_date', 'desc')->first();
      return $vdr;
   }

   public function getRejectVdrs()
   {
      $to = Carbon::now();
      $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-09-16', $to])->whereIn('status', [101, 202, 303])->get();
      return $vdrs;
   }

   public function getPetVdrs()
   {
      $to = Carbon::now();
      $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-09-16', $to])->whereIn('status', [1])->get();
      return $vdrs;
   }

   public function getMarineVdrs()
   {
      $to = Carbon::now();
      $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-09-16', $to])->whereIn('status', [2])->get();
      return $vdrs;
   }

   public function getSuptentVdrs()
   {
      $to = Carbon::now();
      $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-09-16', $to])->whereIn('status', [3])->get();
      return $vdrs;
   }

   public function getProgressVdrs()
   {
      $to = Carbon::now();
      $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-09-16', $to])->whereNotIn('status', [0, 4, 101, 202, 303])->get();
      return $vdrs;
   }

   public function getCompleteVdrs()
   {
      $to = Carbon::now();
      $vdrs = Vdr::where('vessel_id', $this->id)->whereBetween('date', ['2025-09-16', $to])->whereIn('status', [4])->get();
      return $vdrs;
   }

   public function vesselSchedule()
   {
      return $this->hasOne(ScheduleVessel::class);
   }

   public function schedule()
   {
      return $this->belongsTo(Schedule::class);
   }

   public function surveillances()
   {
      return $this->hasMany(Surveillance::class);
   }

   public function histories()
   {
      return $this->hasMany(VesselHistory::class);
   }
   public function crews()
   {
      return $this->hasMany(Crew::class);
   }
   public function master()
   {
      $master = Crew::where('vessel_id', $this->id)->where('rank_id', 1)->first();
      return $master;
   }
   public function co()
   {
      $co = Crew::where('vessel_id', $this->id)->where('rank_id', 2)->first();
      return $co;
   }

   public function docs()
   {
      return $this->hasMany(Document::class);
   }
}
