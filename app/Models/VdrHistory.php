<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VdrHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vdr(){
      return $this->belongsTo(Vdr::class);
    }
}
