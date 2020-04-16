<?php
namespace App\Imports;
   
use App\Models\Dataperu;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
   
class DataperuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[7] != 'negative_cases')
        {
            $confirma = new Dataperu;
            $confirma->country                  = $row[0];
            $confirma->iso3c                    = $row[1];
            $confirma->region                   = $row[2];
            $confirma->date                     = $row[3];
            $confirma->confirmed                = $row[4];
            $confirma->deaths                   = $row[5];
            $confirma->recovered                = $row[6];
            $confirma->negative_cases           = $row[7];
            $confirma->pcr_positivo             = $row[8];
            $confirma->prueba_rapida_positivo   = $row[9];
            $confirma->pcr_prapida_positivo     = $row[10];
            $confirma->save();
        }
    }
}