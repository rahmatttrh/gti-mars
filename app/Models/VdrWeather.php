<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VdrWeather extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'vdr_weathers';

    public function heading()
    {
        return $this->belongsTo(VdrWeatherHeading::class, 'heading_id');
    }

    public function vdr(){
      return $this->belongsTo(Vdr::class);
    }
}
