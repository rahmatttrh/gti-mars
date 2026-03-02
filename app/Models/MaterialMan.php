<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialMan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function port(){
      return $this->belongsTo(Port::class);
    }
}
