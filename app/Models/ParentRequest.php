<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentRequest extends Model
{
   use HasFactory;
   protected $guarded = [];

   // public function request()
   // {
   //    return $this->belongsTo(Request::class);
   // }

   public function requests()
   {
      return $this->hasMany(Request::class, 'parent_id');
   }

   public function origin()
   {
      return $this->belongsTo(Port::class);
   }

   public function employee()
   {
      return $this->belongsTo(Employee::class);
   }

   public function department()
   {
      return $this->belongsTo(Department::class);
   }

   public function activity(){
      return $this->belongsTo(Activity::class);
   }
}
