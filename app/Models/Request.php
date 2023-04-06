<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function activity()
   {
      return $this->belongsTo(Activity::class);
   }

   public function schedule()
   {
      return $this->belongsTo(Schedule::class);
   }

   public function department()
   {
      return $this->belongsTo(Department::class);
   }

   public function cargoItems()
   {
      return $this->hasMany(CargoItem::class);
   }

   public function origin()
   {
      return $this->belongsTo(Port::class);
   }


   public function destination()
   {
      return $this->belongsTo(Port::class);
   }

   public function employee()
   {
      return $this->belongsTo(Employee::class);
   }
}
