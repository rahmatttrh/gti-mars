<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function shcedules()
   {
      return $this->hasMany(Schedule::class);
   }
}
