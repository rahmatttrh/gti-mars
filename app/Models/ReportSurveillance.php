<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSurveillance extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function surveillance()
    {
        return $this->belongsTo(Surveillance::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function port()
    {
        return $this->belongsTo(Port::class);
    }
}
