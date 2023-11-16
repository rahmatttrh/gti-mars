<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleVessel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vessel()
    {
        return $this->belongsTo(Vessel::class);
    }

    public function monday()
    {
        return $this->belongsTo(Port::class);
    }

    public function tuesday()
    {
        return $this->belongsTo(Port::class);
    }

    public function wednesday()
    {
        return $this->belongsTo(Port::class);
    }

    public function thursday()
    {
        return $this->belongsTo(Port::class);
    }
    public function friday()
    {
        return $this->belongsTo(Port::class);
    }
    public function saturday()
    {
        return $this->belongsTo(Port::class);
    }
    public function sunday()
    {
        return $this->belongsTo(Port::class);
    }
}
