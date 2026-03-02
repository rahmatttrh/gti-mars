<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function platform()
   {
      return $this->belongsTo(Platform::class);
   }

   public function wo()
   {
      return $this->hasMany(Wo::class);
   }
}
