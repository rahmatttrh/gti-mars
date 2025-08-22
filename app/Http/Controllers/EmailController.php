<?php

namespace App\Http\Controllers;

use App\Mail\AssignVdrEmail;
use App\Mail\NotificationEmail;
use App\Models\Employee;
use App\Models\User;
use App\Models\Vdr;
use App\Models\VdrCargo;
use App\Models\VdrOperating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
   public function test()
   {
      Mail::to("rahmattrust@gmail.com")->send(new NotificationEmail);
      return redirect()->back()->with('success', 'Email has sent');
   }

   public function approvalVdrSuptent($id)
   {
      $vdr = Vdr::find(dekripRambo($id));
      $totalDaily = VdrOperating::where('vdr_id', $vdr->id)->sum('daily');
      $totalDaily = $vdr->customRound($totalDaily);
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;

      $vdrCargoFuel = VdrCargo::where('vdr_id', $vdr->id)->where('heading_id', 1)->first();
      // dd('ok');
      $user = User::where('username', 'lutfiaryanto')->first();
      $data = [
         'to' => 'Lutfi Aryanto',
         'from' => 'Marine Department',
         'subject' => 'VDR Online Approval Superintendent',
         'body' => '',
         'vdr' => $vdr,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrCargoFuel' => $vdrCargoFuel,
         'link' => route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('suptent')]),
         'approve' => route('vdr.approve.suptent.from.email', enkripRambo($vdr->id)),
         'reject' => route('vdr.reject.from.email', [enkripRambo($vdr->id), enkripRambo('suptent'), enkripRambo($user->id)]),
         'user_id' => $user->id,
         'level' => 'suptent'
      ];

      // TESTING
      // Mail::to("it.medan@grahasegara.com")->send(new AssignVdrEmail($data));
      // Mail::to("rahmattrust@gmail.com")->send(new AssignVdrEmail($data));
      // END OF TESTING


      // Production
      Mail::to("laryanto@pertamina.com")->send(new AssignVdrEmail($data));

      return redirect()->back()->with('success', 'VDR Approved & Email sent to Superintendent');
   }

   public function approvalVdrSuptentLoc($id)
   {

      // dd('ok');
      $vdr = Vdr::find(dekripRambo($id));
      $totalDaily = VdrOperating::where('vdr_id', $vdr->id)->sum('daily');
      $totalDaily = $vdr->customRound($totalDaily);
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;

      $vdrCargoFuel = VdrCargo::where('vdr_id', $vdr->id)->where('heading_id', 1)->first();
      // dd($vdr->area);
      // $user = User::where('username', 'marine')->first();
      $suptentLoc = Employee::where('role', 'suptent_loc')->where('func', $vdr->func)->first();
      $user = User::where('username', $suptentLoc->username)->first();
      $data = [
         'to' =>  $suptentLoc->name,
         'from' => 'Marine Department',
         'subject' => 'VDR Online Approval Suptent On Location',
         'body' => '',
         'vdr' => $vdr,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrCargoFuel' => $vdrCargoFuel,
         'link' => route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('supten-loc')]),
         'approve' => route('vdr.approve.suptent.loc.from.email', enkripRambo($vdr->id)),
         'reject' => route('vdr.reject.from.email', [enkripRambo($vdr->id), enkripRambo('suptent-loc'), enkripRambo($user->id)]),
         'user_id' => $user->id,
         'level' => 'suptent-loc'
      ];

      // TESTING
      // Mail::to(["rahmattrust@gmail.com"])->send(new AssignVdrEmail($data));
      // END OF TESTING


      // $suptentLoc = Employee::where('role', 'suptent_loc')->where('area', $vdr->area)->first();
      // Mail::to($suptentLoc->email)->send(new AssignVdrEmail($data));





      // Mail::to(["mk.umar.agam@pertamina.com", "mk.rezky.hardanto@pertamina.com", "mk.muhammad.hasan@pertamina.com"])->send(new AssignVdrEmail($data));
      return redirect()->back()->with('success', 'VDR Approved & Email sent to Suptent on Location');
   }

   public function approvalVdrSuptentBu($id)
   {

      // dd('ok');
      $vdr = Vdr::find(dekripRambo($id));
      $totalDaily = VdrOperating::where('vdr_id', $vdr->id)->sum('daily');
      $totalDaily = $vdr->customRound($totalDaily);
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;

      $vdrCargoFuel = VdrCargo::where('vdr_id', $vdr->id)->where('heading_id', 1)->first();
      // dd($vdr->area);
      // $user = User::where('username', 'marine')->first();


      // TESTING
      $suptentLoc = Employee::where('role', 'suptent_loc')->first();
      $user = User::where('username', $suptentLoc->username)->first();
      // END TESTING

      $suptentBu = Employee::where('role', 'suptent_loc')->where('area', $vdr->area)->first();
      $user = User::where('username', $suptentBu->username)->first();

      $data = [
         'to' => 'Superintendent of ' . $vdr->area,
         'from' => 'Marine Department',
         'subject' => 'VDR Online Approval Suptent On Location',
         'body' => '',
         'vdr' => $vdr,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrCargoFuel' => $vdrCargoFuel,
         'link' => route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('supten-loc')]),
         'approve' => route('vdr.approve.suptent.loc.from.email', enkripRambo($vdr->id)),
         'reject' => route('vdr.reject.from.email', [enkripRambo($vdr->id), enkripRambo('suptent-loc'), enkripRambo($user->id)]),
         'user_id' => $user->id,
         'level' => 'suptent-loc'
      ];

      // TESTING
      // Mail::to("it.medan@grahasegara.com")->send(new AssignVdrEmail($data));
      // Mail::to("rahmattrust@gmail.com")->send(new AssignVdrEmail($data));

      // END OF TESTING


      // $suptentLoc = Employee::where('role', 'suptent_loc')->where('area', $vdr->area)->first();
      // Mail::to($suptentBu->email)->send(new AssignVdrEmail($data));





      // Mail::to(["mk.umar.agam@pertamina.com", "mk.rezky.hardanto@pertamina.com", "mk.muhammad.hasan@pertamina.com"])->send(new AssignVdrEmail($data));
      return redirect()->back()->with('success', 'VDR Approved & Email sent to Suptent on Location');
   }


   public function approvalVdrMarine($id)
   {
      $vdr = Vdr::find(dekripRambo($id));
      $totalDaily = VdrOperating::where('vdr_id', $vdr->id)->sum('daily');
      $totalDaily = $vdr->customRound($totalDaily);
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;

      $vdrCargoFuel = VdrCargo::where('vdr_id', $vdr->id)->where('heading_id', 1)->first();
      // dd('ok');
      $user = User::where('username', 'marine')->first();
      $data = [
         'to' => 'Marine Department',
         'from' => 'Fuel Monitoring Team',
         'subject' => 'VDR Online Approval Marine',
         'body' => '',
         'vdr' => $vdr,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrCargoFuel' => $vdrCargoFuel,
         'link' => route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('marine')]),
         'approve' => route('vdr.approve.marine.from.email', enkripRambo($vdr->id)),
         'reject' => route('vdr.reject.from.email', [enkripRambo($vdr->id), enkripRambo('suptent'), enkripRambo($user->id)]),
         'user_id' => $user->id,
         'level' => 'marine'
      ];

      // TESTING
      // Mail::to(["it.medan@grahasegara.com", "rahmattrust@gmail.com"])->send(new AssignVdrEmail($data));
      // END OF TESTING



      // Production
      Mail::to(["mk.umar.agam@pertamina.com", "mk.rezky.hardanto@pertamina.com", "mk.muhammad.hasan@pertamina.com"])->send(new AssignVdrEmail($data));
      return redirect()->back()->with('success', 'VDR Approved & Email sent Marine Departement');
   }


   public function approvalVdrPet($id)
   {
      $vdr = Vdr::find(dekripRambo($id));
      $totalDaily = VdrOperating::where('vdr_id', $vdr->id)->sum('daily');
      $totalDaily = $vdr->customRound($totalDaily);
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;

      $vdrCargoFuel = VdrCargo::where('vdr_id', $vdr->id)->where('heading_id', 1)->first();
      // dd('ok');
      $user = User::where('username', 'pet')->first();

      $data = [
         'to' => 'Fuel Monitoring Team',
         'from' => $vdr->vessel->name,
         'subject' => 'VDR Online Approval PET',
         'body' => '',
         'vdr' => $vdr,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrCargoFuel' => $vdrCargoFuel,
         'link' => route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('pet')]),
         'approve' => route('vdr.approve.marine.from.email', enkripRambo($vdr->id)),
         'reject' => route('vdr.reject.from.email', [enkripRambo($vdr->id), enkripRambo('suptent'), enkripRambo($user->id)]),
         'user_id' => $user->id,
         'level' => 'pet'
      ];

      // $petEmails = ['mk.yusuf.hibatullah@pertamina.com', 'mk.lutfa.jasworo@pertamina.com', 'mk.luthfi.alhafiizh@pertamina.com', 'mk.setyo.wiyono@pertamina.com', 'mk.bryan.jhon@pertamina.com', 'mk.raditya.r@pertamina.com'];

      // $petEmails = ["rahmattrust@gmail.com", "develop@ekanuri.com"];

      // foreach($petEmails as $email){
      //    Mail::to($email)->send(new AssignVdrEmail($data));
      // }

      // TESTING
      // Mail::to(["it.medan@grahasegara.com", "rahmattrust@gmail.com"])->send(new AssignVdrEmail($data));
      // Mail::to("rahmattrust@gmail.com")->send(new AssignVdrEmail($data));
      // Mail::to("develop@ekanuri.com")->send(new AssignVdrEmail($data));
      // END OF TESTING



      // Production
      Mail::to([
         "mk.yusuf.hibatullah@pertamina.com", 
         "mk.lutfa.jasworo@pertamina.com", 
         "mk.luthfi.alhafiizh@pertamina.com", 
         "mk.setyo.wiyono@pertamina.com", 
         "mk.bryan.jhon@pertamina.com", 
         "mk.raditya.r@pertamina.com", 
         "mk.akhmad.kurniawan@pertamina.com"
         ])->send(new AssignVdrEmail($data));
      return redirect()->back()->with('success', 'VDR Released & Email sent to All Fuel Monitoring Team');
   }








   // public function approvalVdrPet($id){
   //    $vdr = Vdr::find(dekripRambo($id));
   //    $totalDaily = VdrOperating::where('vdr_id', $vdr->id)->sum('daily') ;
   //    $totalDaily = $vdr->customRound($totalDaily);
   //    $debugHours = 0;
   //    $debugMinutes = 0;
   //    $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
   //    foreach ($ops as $op) {
   //       $time = $op->time;
   //       $array = explode('.', $op->time);
   //       $hours = floor($time);
   //       $minutes = intval($array[1]);

   //       $debugHours += $hours;
   //       $debugMinutes += $minutes;
   //    }
   //    // dd($debugHours);

   //    if ($debugMinutes >= 60) {
   //       $minLeft = $debugMinutes - 60;
   //       $debugMinutes = $minLeft;
   //       $debugHours += 1;
   //       if ($debugMinutes >= 60) {
   //          $minLeft = $debugMinutes - 60;
   //          $debugMinutes = $minLeft;
   //          $debugHours += 1;
   //       }
   //       if ($debugMinutes >= 60) {
   //          $minLeft = $debugMinutes - 60;
   //          $debugMinutes = $minLeft;
   //          $debugHours += 1;
   //       }
   //    }

   //    if ($debugMinutes < 10) {
   //       $finalMinutes = '0' . $debugMinutes;
   //    } else {
   //       $finalMinutes = $debugMinutes;
   //    }
   //    $finalHours  = sprintf('%02d', floor($debugHours));
   //    $final = $finalHours . ':' . $finalMinutes;

   //    $vdrCargoFuel = VdrCargo::where('vdr_id', $vdr->id)->where('heading_id', 1 )->first();
   //    // dd('ok');
   //    $user = User::where('username', 'pet')->first();

   //    $data = [
   //       'to' => 'Fuel Monitoring Team',
   //       'from' => $vdr->vessel->name,
   //       'subject' => 'VDR Online Approval PET',
   //       'body' => '',
   //       'vdr' => $vdr,
   //       'totalJam' => $final,
   //       'totalDaily' => $totalDaily,
   //       'vdrCargoFuel' => $vdrCargoFuel,
   //       'link' => route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('pet')]),
   //       'approve' => route('vdr.approve.marine.from.email', enkripRambo($vdr->id)),
   //       'reject' => route('vdr.reject.from.email', [enkripRambo($vdr->id), enkripRambo('suptent'), enkripRambo($user->id)]),
   //       'user_id' => $user->id,
   //       'level' => 'pet'
   //    ];

   //    // $petEmails = ['mk.yusuf.hibatullah@pertamina.com', 'mk.lutfa.jasworo@pertamina.com', 'mk.luthfi.alhafiizh@pertamina.com', 'mk.setyo.wiyono@pertamina.com', 'mk.bryan.jhon@pertamina.com', 'mk.raditya.r@pertamina.com'];

   //    // $petEmails = ["rahmattrust@gmail.com", "develop@ekanuri.com"];

   //    // foreach($petEmails as $email){
   //    //    Mail::to($email)->send(new AssignVdrEmail($data));
   //    // }

   //    // TESTING
   //    Mail::to(["rahmattrust@gmail.com", "develop@ekanuri.com"])->send(new AssignVdrEmail($data));
   //    // Mail::to("rahmattrust@gmail.com")->send(new AssignVdrEmail($data));
   //    // Mail::to("develop@ekanuri.com")->send(new AssignVdrEmail($data));
   //    // END OF TESTING


   //    // Mail::to(["mk.yusuf.hibatullah@pertamina.com", "mk.lutfa.jasworo@pertamina.com", "mk.luthfi.alhafiizh@pertamina.com", "mk.setyo.wiyono@pertamina.com", "mk.bryan.jhon@pertamina.com", "mk.raditya.r@pertamina.com"])->send(new AssignVdrEmail($data));
   //    return redirect()->back()->with('success', 'VDR Released & Email sent to All Fuel Monitoring Team');
   // }


}
