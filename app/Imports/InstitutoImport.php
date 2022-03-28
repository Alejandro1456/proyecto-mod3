<?php

namespace App\Imports;

use App\Models\Instituto;
use Maatwebsite\Excel\Concerns\ToModel;

class InstitutoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
            //
            return new Instituto([
                'materia'=> $row['materia'],
                'carrera'=> $row['carrera'],
                'tiempo'=> $row['tiempo'],
            ]);
        
    }
}
