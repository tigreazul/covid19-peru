<?php
namespace App\Imports;
   
use App\Models\Ubigeo;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
   
class UbigeoperuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[1] != 'iso3c')
        {
            $confirma = new Ubigeo;
            $confirma->country                  = $row[0];
            $confirma->iso3c                    = $row[1];
            $confirma->region                   = $row[2];
            $confirma->cod_dep_inei             = $row[3];
            $confirma->cod_dep_reniec           = $row[4];
            $confirma->iso_3166_2_code          = $row[5];
            $confirma->date                     = $row[6];
            $confirma->confirmed                = $row[7];
            $confirma->deaths                   = $row[8];
            $confirma->recovered                = $row[9];
            $confirma->negative_cases           = $row[10];
            $confirma->pcr_positivo             = $row[11];
            $confirma->prueba_rapida_positivo   = $row[12];
            $confirma->pcr_prapida_positivo     = $row[13];
            $confirma->pob_2017                 = $row[14];
            $confirma->save();
        }
    }
}