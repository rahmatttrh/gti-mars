<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function schedule(){
      return $this->belongsTo(Schedule::class);
   }

   public function origin()
   {
      return $this->belongsTo(Port::class);
   }

   public function destination()
   {
      return $this->belongsTo(Port::class);
   }

   public function items(){
      return $this->hasMany(CargoItem::class);
   }


}
