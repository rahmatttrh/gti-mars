<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VdrEngine extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function heading()
    {
        return $this->belongsTo(VdrEngineHeading::class, 'heading_id');
    }
}
