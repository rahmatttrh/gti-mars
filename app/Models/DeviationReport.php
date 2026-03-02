<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviationReport extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function deviation()
   {
      return $this->belongsTo(Deviation::class);
   }
}
