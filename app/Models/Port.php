<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function parents()
   {
      return $this->hasMany(ParentRequest::class, 'origin_id');
   }

   public function schedules()
   {
      return $this->hasMany(Schedule::class, 'origin_id');
   }

   public function requests()
   {
      return $this->hasMany(Request::class, 'origin_id');
   }

   public function cargos()
   {
      return $this->hasMany(Cargo::class, 'origin_id');
   }

   public function jetties()
   {
      return $this->hasMany(Jetty::class);
   }
   public function employees()
   {
      return $this->hasMany(Employee::class);
   }

   public function deviations()
   {
      return $this->hasMany(Deviation::class);
   }

   public function reports()
   {
      return $this->hasMany(Report::class);
   }
}
