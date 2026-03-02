<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportRequest extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function request()
   {
      return $this->belongsTo(Request::class);
   }

   public function status()
   {
      return $this->belongsTo(Status::class);
   }

   public function port()
   {
      return $this->belongsTo(Port::class);
   }

   public function employee()
   {
      return $this->belongsTo(Employee::class);
   }
}
