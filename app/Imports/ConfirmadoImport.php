<?php
namespace App\Imports;
   
use App\Confirmado;
use App\Fechareporte;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
   
class ConfirmadoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0] == 'Province/State')
        {
            for ($i=0; $i < 4 ; $i++) { 
                unset($row[$i]);
            }
            
            // dd($row);
            foreach ($row as $key => $value) {
                $fechas = new Fechareporte;
                $fechas->fechaReporte = $row[$key];
                $fechas->save();
                // new Confirmado([
                //     'fechaReporte' => $row[$key]
                // ]);
        
            }
        }else{
            $arrFecha = array();
            $fechas = DB::table('fechareporte')->get();
            // dd($fechas[0]->fechaReporte);
            $inforacion = array(
                'Provincia'     => $row[0],
                'Pais'          => $row[1],
                'latitud'       => $row[2],
                'longitud'      => $row[3],
            );
            for ($i=0; $i < 4 ; $i++) { 
                unset($row[$i]);
            }
            $i = 0;
            foreach ($row as $key => $value) {
                
                $arrFecha[] = array(
                    'provincia'     => $inforacion['Provincia'],
                    'pais'          => $inforacion['Pais'],
                    'latitud'       => $inforacion['latitud'],
                    'longitud'      => $inforacion['longitud'],
                    'fecha'         => $fechas[$i]->fechaReporte,
                    'total'         => $row[$key]
                );
                $i++;
            }
            // echo '<pre>';print_r($arrFecha[0]['pais']); die();
            $ii = 1;
            foreach ($arrFecha as $k => $valor) {
                // print_r($valor); die();
                $confirma = new Confirmado;
                $confirma->provincia  = $valor['provincia'];
                $confirma->pais       = $valor['pais'];
                $confirma->latitud    = $valor['latitud'];
                $confirma->longitud   = $valor['longitud'];
                $confirma->fecha      = $valor['fecha'];
                $confirma->total      = $valor['total'];
                $confirma->contador   = $ii;
                $confirma->save();
                $ii++;
            }
            // return new Confirmado([
            //     'Provincia'     => $row[0],
            //     'Pais'          => $row[1],
            //     'latitud'       => $row[2],
            //     'longitud'      => $row[3],
            //     'fecha'         => $row[4],
            //     'total'         => $row[5]
            // ]);
        }
    }
}