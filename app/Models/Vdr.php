<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vdr extends Model
{
   use HasFactory;

   protected $guarded = [];

   public function vessel(){
      return $this->belongsTo(Vessel::class);
   }

   public function operatings(){
      return $this->hasMany(VdrOperating::class);
   }

   public function times(){
      return $this->hasMany(VdrTimestamp::class);
   }

  
}
