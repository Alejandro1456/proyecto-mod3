<?php

namespace App\Exports;

use App\Models\Instituto;
use Maatwebsite\Excel\Concerns\FromCollection;


class InstitutoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    //para seleccionar datos especificos en vez de all colocar select('' y loc campos)-get();
        return Instituto::all();
    }
    public function headings(): array
    {
        return['ID','materia','carrera','tiempo'];

    }
}
