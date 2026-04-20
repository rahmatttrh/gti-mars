<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use App\Models\Vessel;
use Illuminate\Http\Request;

class IntermilanVesselController extends Controller
{
    public function detail($id)
    {
        $vessel = Vessel::find(dekripRambo($id));
        $requestVessels = ModelsRequest::where('vessel_id', $vessel->id)->get();
        return view(
            'pages-stisla.vessel.intermilan.detail',
            [
                'vessel' => $vessel,
                'requestVessels' => $requestVessels
            ]
        );
    }
}
