<?php

function formatRupiah($data)
{
   $rupiah = 'Rp ' . number_format($data, 0, ",", ".");
   return $rupiah;
}


function enkripRambo($data)
{
   return base64_encode(base64_encode(base64_encode($data)));
}

function dekripRambo($data)
{
   return base64_decode(base64_decode(base64_decode($data)));
}
