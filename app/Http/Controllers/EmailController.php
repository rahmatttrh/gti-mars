<?php

namespace App\Http\Controllers;

use App\Mail\AssignVdrEmail;
use App\Mail\NotificationEmail;
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

   public function approvalVdr($id){
      $vdr = Vdr::find(dekripRambo($id));
      $totalDaily = VdrOperating::where('vdr_id', $vdr->id)->sum('daily') ;
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

      $vdrCargoFuel = VdrCargo::where('vdr_id', $vdr->id)->where('heading_id', 1 )->first();

      $data = [
         'to' => 'Lutfi Aryanto',
         'from' => 'Marine Department',
         'subject' => 'VDR Online Approval',
         'body' => '',
         'vdr' => $vdr,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrCargoFuel' => $vdrCargoFuel,
         'link' => route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('activity')]),
         'approve' => route('vdr.approve.suptent.from.email', enkripRambo($vdr->id))
      ];

      
      // Mail::to("rahmattrust@gmail.com")->send(new AssignVdrEmail($data));
      Mail::to("develop@ekanuri.com")->send(new AssignVdrEmail($data));
      return redirect()->back()->with('success', 'Email sent');
   }
}
