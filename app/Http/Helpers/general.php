<?php

function customRound($number){
   
}

function formatRupiah($data)
{
   $rupiah = 'Rp ' . number_format($data, 0, ",", ".");
   return $rupiah;
}

function formatRibuan($data)
{
   $ribuan =  number_format($data, 0, ",", ".");
   return $ribuan;
}

function formatDate($data)
{
   $date = \Carbon\Carbon::parse($data)->format('d/m/Y');
   return $date;
}


function formatDateMonth($data)
{
   $date = \Carbon\Carbon::parse($data)->format('F');
   return $date;
}

function formatDateOnly($data)
{
   $date = \Carbon\Carbon::parse($data)->format('d');
   return $date;
}

function formatDateName($data)
{
   $date = \Carbon\Carbon::parse($data)->format('d F Y');
   return $date;
}

function formatDateTime($data)
{
   $date = \Carbon\Carbon::parse($data)->format('H:i d-m-Y ');
   return $date;
}

function formatTime($data)
{
   $date = \Carbon\Carbon::parse($data)->format('H:i');
   return $date;
}

function formatDayName($data)
{
   $date = \Carbon\Carbon::parse($data)->format('l');
   return $date;
}

function dayDate($data)
{
   $date = \Carbon\Carbon::parse($data)->format('l ,d/m/Y');
   return $date;
}


function floatToTime($floatValue)
{
   // Pisahkan bagian jam dan menit
   $minutes =  fmod($floatValue, 1) * 100;
   // $minutes =  substr($minutes, 2);

   // Menambahkan angka 0 di depan jika hanya satu digit
   $hours = sprintf('%02d', floor($floatValue));
   $finalMinutes = sprintf('%02d', $minutes);

   // if ($minutes < 10) {
   //    $finalMinutes = '0' . $minutes;
   // } else {
   //    $finalMinutes = $minutes;
   // }

   // Format waktu dengan angka nol di depan jika diperlukan
   // $formattedTime = sprintf('%02d:%02d', $hours, $minutes);
   $formattedTime = $hours . ':' . $minutes;

   return $formattedTime;
}

function host()
{
   $host = '/var/www/html/dsp-phe/';
   // $srv = $_SERVER['SERVER_NAME'];
   // $port = ":" .  $_SERVER['SERVER_PORT'];
   // $host = 'http://' . $srv . ':' . $port;

   return $host;
}


function enkripRambo($data)
{
   return base64_encode(base64_encode(base64_encode($data)));
}

function dekripRambo($data)
{
   return base64_decode(base64_decode(base64_decode($data)));
}


function vdrId($id)
{
   // Menambahkan awalan "VDR#"
   $awalan = "VDR#";

   // Mengonversi $id ke dalam format tiga digit dengan leading zeros
   $idPadded = sprintf("%05d", $id);

   // Menggabungkan awalan dan $idPadded
   $hasil = $awalan . $idPadded;

   return $hasil;
}

function getRoleName($user){
   if ($user->hasRole('admin-dsp')){
      $roleName = 'Admin DSP';
   } else if ($user->hasRole('admin-vdr')){
      $roleName = 'Admin VDR';
   } else if($user->hasRole('superadmin-dsp')){
      $roleName = 'Super Admin';
   } else if($user->hasRole('superadmin-vdr')){
      $roleName = 'Super Admin';
   } else if($user->hasRole('marine')){
      $roleName = 'Super Admin';
   } else {
      $roleName = 'OK';
   }

   return $roleName;
}


function getTotalHours($value){
      
   $totalHours = '';
   $debugHours = 0;
   $debugMinutes = 0;
  
   $array = explode('.', $value);
   $hours = floor($value);
   $minutes = intval($array[1]);
   
   $debugHours += $hours;
   $debugMinutes += $minutes;
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

   return $final;
}
