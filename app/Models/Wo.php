<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wo extends Model
{
    use HasFactory;

    protected $guarded = [];




    // Forigen Key
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}
