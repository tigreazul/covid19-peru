<?php
namespace App\Imports;
   
use App\Departamento;
use App\Fechareporte;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
   
class DepartamentoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[1] != 'Total Casos')
        {
            $confirma = new Departamento;
            $confirma->fecha            = date('Y-m-d');
            $confirma->departamento     = $row[0];
            $confirma->totalCasos       = $row[1];
            $confirma->totalMuertes     = $row[2];
            $confirma->totalRecuperados = $row[3];
            $confirma->save();
        }
    }
}