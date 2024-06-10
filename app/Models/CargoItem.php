<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoItem extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function request()
   {
      return $this->belongsTo(Request::class);
   }

   public function cargo(){
      return $this->belongsTo(Cargo::class);
   }

   public function offloading()
   {
      return $this->belongsTo(Offloading::class);
   }

   public function deflection()
   {
      return $this->belongsTo(Deflection::class);
   }
}
