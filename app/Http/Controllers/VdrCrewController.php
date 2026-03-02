<?php

namespace App\Http\Controllers;

use App\Exports\TemplateCrewVdr;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VdrCrewController extends Controller
{
    //

    public function templateExcel()
    {
        return Excel::download(new TemplateCrewVdr, 'Template-Import-Crew-di-vdr.xlsx');
    }
}
