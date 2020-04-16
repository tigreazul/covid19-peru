<?php
namespace App\Imports;
   
use App\Datos;
use Maatwebsite\Excel\Concerns\ToModel;
   
class DatosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Datos([
            'Provincia'   => $row[0],
            'Pais'        => $row[1],
            'ultima_actualziacion' => $row[2],
            'comfirmado'  => $row[3],
            'muerto'      => $row[4],
            'recuperado'  => $row[5],
            'latitud'     => $row[6],
            'longitud'    => $row[7]
        ]);

    }
}