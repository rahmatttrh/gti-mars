<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VdrActivity extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'sb' => 'decimal:2',
        'sp' => 'decimal:2',
    ];


    public function vdr()
    {
        return $this->belongsTo(Vdr::class);
    }
}
