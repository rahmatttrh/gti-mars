<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contract(){
        return $this->belongsTo(Contract::class);
    }

    public function heading()
   {
      return $this->belongsTo(VdrOperatingHeader::class, 'heading_id');
   }
}
