<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function vessel()
   {
      return $this->belongsTo(Vessel::class);
   }

   public function origin()
   {
      return $this->belongsTo(Port::class);
   }

   public function jetty()
   {
      return $this->belongsTo(Jetty::class);
   }

   public function destination()
   {
      return $this->belongsTo(Port::class);
   }

   // public function port()
   // {
   //    return $this->belongsTo(Port::class);
   // }
}
