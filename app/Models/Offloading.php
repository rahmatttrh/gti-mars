<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offloading extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function request()
   {
      return $this->belongsTo(Request::class);
   }

   public function cargoitem()
   {
      return $this->belongsTo(CargoItem::class);
   }

   public function deflection()
   {
      return $this->belongsTo(Deflection::class);
   }
}
