<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function schedules()
   {
      return $this->hasMany(Schedule::class, 'origin_id');
   }

   public function jetties()
   {
      return $this->hasMany(Jetty::class);
   }
}
