<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function schedule()
   {
      return $this->belongsTo(Schedule::class);
   }

   public function vessel()
   {
      return $this->belongsTo(Vessel::class);
   }

   public function status()
   {
      return $this->belongsTo(Status::class);
   }

   public function port()
   {
      return $this->belongsTo(Port::class);
   }

   public function destination()
   {
      return $this->belongsTo(Port::class);
   }

   public function employee()
   {
      return $this->belongsTo(Employee::class);
   }
}
