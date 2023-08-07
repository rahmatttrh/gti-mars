<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
   use HasFactory;
   protected $guarded = [];

   public function parent()
   {
      return $this->belongsTo(ParentRequest::class);
   }

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

   public function passengerItems()
   {
      return $this->hasMany(PassengerItem::class);
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

   public function reports()
   {
      return $this->hasMany(ReportRequest::class);
   }

   public function deflections()
   {
      return $this->hasMany(Deflection::class);
   }

   public function rejects()
   {
      return $this->hasMany(RequestReject::class);
   }



   public function getStatus()
   {
      $status = ReportRequest::where('request_id', $this->id)->orderBy('created_at', 'desc')->first();
      return $status;
   }
}
