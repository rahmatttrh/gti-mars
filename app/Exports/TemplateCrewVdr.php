<?php

namespace App\Exports;

use App\Models\Crew;
use App\Models\VdrCrew;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TemplateCrewVdr implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        // Use a query to join the 'productd' and 'profiles' tables
        return VdrCrew::get();
    }

    public function headings(): array
    {
        // Define the column headings
        return [
            'Crew / Passenger * ',
            'Name *',
            'Rank ',
            'Company '
        ];
    }
}
