<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable, HasRoles;

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
      'name',
      'username',
      'email',
      'password',
   ];

   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
      'password',
      'remember_token',
   ];

   /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
   protected $casts = [
      'email_verified_at' => 'datetime',
   ];

   public function getVesselId()
   {
      $vessel = Vessel::where('email', auth()->user()->email)->first();
      return $vessel->id;
   }

   public function getPlatformId()
   {
      $platform = Platform::where('email', $this->email)->first();
      return $platform->id;
   }

   public function getPartyId()
   {
      $party = Party::where('email', $this->email)->first();
      return $party->id;
   }

   public function getLogo()
   {
      $platform = Platform::where('email', $this->email)->first();
      return $platform->logo;
   }

   public function getPartyLogo()
   {
      $party = Party::where('email', $this->email)->first();
      return $party->logo;
   }

   public function getSystem()
   {
      $platform = Platform::where('email', $this->email)->first();
      return $platform->system;
   }

   public function getPlatformLogo()
   {
      $party = Party::where('email', $this->email)->first();
      return $party->platform->logo;
   }

   public function getPlatformSystem()
   {
      $party = Party::where('email', $this->email)->first();
      return $party->platform->system;
   }

   public function getDepartment()
   {
      $employee = Employee::where('email', $this->email)->first();
      // if ($employee->department_id) {
      //    $department = $employee->department->name;
      // } else {
      //    $department = '-';
      // }
      return $employee->department;
   }

   public function getPort()
   {
      $employee = Employee::where('email', $this->email)->first();
      return $employee->port_id;
   }

   public function getPortName()
   {
      $employee = Employee::where('email', $this->email)->first();
      if ($employee) {
         return $employee->port->name;
      } else {
         $port = Port::where('email', $this->email)->first();
         return $port->name;
      }
   }

   public function getEmployeeId()
   {
      $employee = Employee::where('email', $this->email)->first();
      return $employee->id;
   }

   public function getMonth()
   {
      $now = Carbon::now();
      return $now->format('m');
   }

   public function isPlatform()
   {
      $port = Port::where('email', $this->email)->first();
      if ($port) {
         if ($port->type == 'platform') {
            return true;
         } else {
            return false;
         }
      } else {
         return false;
      }
   }
}
