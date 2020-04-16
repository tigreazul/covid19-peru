<?php
namespace App\Imports;
   
use App\Models\Testresult;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
   
class TestresultImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[1] != 'personas')
        {
            $confirma = new Testresult;
            $confirma->fecha          = $row[0];
            $confirma->personas       = $row[1];
            $confirma->resultado      = $row[2];
            $confirma->tipo_prueba    = $row[3];
            $confirma->save();
        }
    }
}