<?php
namespace App\Imports;
   
use App\Models\Hospitalizado;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
   
class HospitalizadoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[1] != 'hospitalizados')
        {
            $confirma = new Hospitalizado;
            $confirma->fecha                = $row[0];
            $confirma->hospitalizados       = $row[1];
            $confirma->sospechosos          = $row[2];
            $confirma->confirmados          = $row[3];
            $confirma->essalud              = $row[4];
            $confirma->minsa                = $row[5];
            $confirma->clinica_privada      = $row[6];
            $confirma->otros                = $row[7];
            $confirma->uci                  = $row[8];
            $confirma->ventilacion_mecanica = $row[9];
            $confirma->estacionario         = $row[10];
            $confirma->favorable            = $row[11];
            $confirma->cuidado              = $row[12];
            $confirma->altas                = $row[13];
            $confirma->comunicado_minsa     = $row[14];
            $confirma->save();
        }
    }
}