<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deflection extends Model
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

   public function port()
   {
      return $this->belongsTo(Port::class);
   }

   public function offloading()
   {
      return $this->hasOne(Offloading::class);
   }
}
