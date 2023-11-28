<?php

function formatRupiah($data)
{
   $rupiah = 'Rp ' . number_format($data, 0, ",", ".");
   return $rupiah;
}

function formatDate($data){
   $date = \Carbon\Carbon::parse($data)->format('d/m/Y');
   return $date;
}

function floatToTime($floatValue)
{
   // Pisahkan bagian jam dan menit
   $minutes =  fmod($floatValue, 1) * 100;
   // $minutes =  substr($minutes, 2);

   $hours = floor($floatValue);

   // Format waktu dengan angka nol di depan jika diperlukan
   $formattedTime = sprintf('%02d:%02d', $hours, $minutes);

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
