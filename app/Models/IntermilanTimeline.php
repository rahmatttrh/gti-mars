<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntermilanTimeline extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function intermilan()
    {
        return $this->belongsTo(Intermilan::class, 'intermilan_id');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
