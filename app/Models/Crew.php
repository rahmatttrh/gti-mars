<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function passengers()
   {
      return $this->hasMany(PassengerItem::class);
   }
}
