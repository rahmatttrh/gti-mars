<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vessel(){
        return $this->belongsTo(Vessel::class);
    }   

    public function details(){
        return $this->hasMany(ContractDetail::class);
    }
}
