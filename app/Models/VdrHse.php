<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VdrHse extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function header()
    {
        return $this->belongsTo(VdrHseHeader::class, 'header_id');
    }
}
