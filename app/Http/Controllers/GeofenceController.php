<?php

namespace App\Http\Controllers;

use Ballen\Distical\Entities\LatLong;
use Ballen\Distical\Calculator as DistanceCalculator;
use Illuminate\Http\Request;

class GeofenceController extends Controller
{
    public function getDistance(){
        $monas = new LatLong(-6.175403,106.824584);
        $hi = new LatLong(-6.191876,106.8203805);
        $calDistance = new DistanceCalculator($monas, $hi);
        $distance = $calDistance->get();
        $km = $distance->asMiles() *  1.609344;
        $meters = $km * 1000;
        dd('Jarak dari Monas ke Bundaran HI adalah ' . round($meters) . ' Meter');


        $latTo = -6.175267;
        $longTo = 106.8258608;
        $latFrom = -6.191876;
        $longFrom = 106.8203805;

        $theta = $longTo - $longFrom;
        $miles = (sin(deg2rad($latTo))) * sin(deg2rad($latFrom)) + (cos(deg2rad($latTo)) *  cos(deg2rad($latFrom)) * cos(deg2rad($theta)) );

        $miles = acos($miles);
        $miles = rad2deg($miles);

        $resMiles = $miles * 60 * 1.1515;
        $resFeet = $resMiles *  5280;
        $resYards = $resFeet / 3;
        $resKilometers = $resMiles *  1.609344;
        $resMeters = $resKilometers * 1000;

        dd(round($resMeters));

    }
    
}
