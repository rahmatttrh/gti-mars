<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayloadType extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Primary Key
    public function wo()
    {
        return $this->hasMany(Wo::class);
    }
}
