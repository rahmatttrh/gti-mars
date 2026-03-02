<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleRoute extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function schedule()
   {
      return $this->belongsTo(Schedule::class);
   }

   public function request()
   {
      return $this->belongsTo(Request::class);
   }

   public function port()
   {
      return $this->belongsTo(Port::class);
   }
}
