<?php

namespace App\Http\Controllers;
use App\{
    Coronavirus,Pais, Datos, Confirmado, Fechareporte, Recuperado, Muerte
};
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DateTime;

use App\Imports\{
    DatosImport, ConfirmadoImport, RecuperadoImport, MuerteImport, DepartamentoImport
};
use Maatwebsite\Excel\Facades\Excel;

class InicioController extends Controller
{
    private $ruta;

    public function __construct(){
        $this->ruta = env('URL_API', 'https://covid19.mathdro.id/api/');
    }
    public function index(Request $request){
        $arr = $this->estadistica_diaria();
        
        $vPaises = DB::table('pais')->get();

        $pConfirmados = DB::table('proyeccionconfirmados')->where('id','<=','18')->get();
        $departamento = DB::table('departamento')->where('fecha',date('Y-m-25'))->get();
        $datos = $this->historial();

        return view('inicio')->with('total',$arr)
            ->with('datos',$datos)
            ->with('pConfirmados',$pConfirmados)
            ->with('departamento',$departamento)
            ->with('pais',$vPaises);
    }

    public function estadistica_diaria(){
        $total      = file_get_contents($this->ruta);
        $totalPeru  = file_get_contents($this->ruta.'countries/PE');
       
        $jsonTotal = json_decode($total);
        $jsonPeru  = json_decode($totalPeru);

        $date = new DateTime($jsonTotal->lastUpdate);
        $fechaApi = $date->format('Y-m-d');

        $corona = DB::table('historialcoronavirus')->orderBy('id', 'DESC')->first();
        $confirmado = $jsonPeru->confirmed->value;
        $recuperado = $jsonPeru->recovered->value;
        $muerto     = $jsonPeru->deaths->value;

        if( ($confirmado != $corona->confirmado) || ($recuperado != $corona->recuperados) || ($muerto != $corona->muertes) )
        {
            $covid = new Coronavirus;
            $covid->confirmado  = $jsonPeru->confirmed->value;
            $covid->recuperados = $jsonPeru->recovered->value;
            $covid->muertes     = $jsonPeru->deaths->value;
            $covid->save();
        }
        
        $arr = array(
            'mundial' => array(
                'confirmado' => $jsonTotal->confirmed->value,
                'recuperado' => $jsonTotal->recovered->value,
                'muerte'    => $jsonTotal->deaths->value
            ),
            'peru' => array(
                'confirmado' => $jsonPeru->confirmed->value,
                'recuperado' => $jsonPeru->recovered->value,
                'muerte'    => $jsonPeru->deaths->value
            )
        );
        return $arr;
    }

    public function mapa_full(){
        $arr = $this->estadistica_diaria();
        // dd($arr); 2020-04-14 00:00:00
        $hospital = \DB::table('data_detalle_hospitalizados')->orderBy('id','desc')->first();
        // dd($hospital);
        return view('mapa_dash')->with('total',$arr)->with('hospital',$hospital);
    }

    public function paises(Request $request){
        $search = $request->searchTerm;
        
        $paises  = file_get_contents($this->ruta.'countries');
        $jsonPais = json_decode($paises);
        $pais = $jsonPais->countries;
        foreach ($pais as $vPaises => $sigla) {
            $vPais = DB::table('pais')->where('sigla',$sigla)->get();
            if( count($vPais) == 0 ){
                $paises = new Pais;
                $paises->pais   = $vPaises;
                $paises->sigla  = $sigla;
                $paises->estado = 1;
                $paises->save();
            }
        }

        if( empty($search) ){
            $vPaises = DB::table('pais')->get();
        }else{
            $vPaises = DB::table('pais')->where('pais', 'LIKE', '%' . $search . '%')->get();
            // dd($vPaises);
        }
        
        $val = array();
        foreach ($vPaises as $value) {
            $val[] = array(
                'id'    => $value->sigla,
                'text'  => $value->pais,
            );
        }
        return response()->json($val, 200);
    }

    public function historial(){
       $confirmed   = $this->confirmado('confirmed');
       $deaths      = $this->confirmado('deaths');
       $recovered   = $this->confirmado('recovered');

        $datos = array(
            'confirma' => $confirmed,
            'recuperado' => $recovered,
            'muerte' => $deaths
        );
        // dd($datos);
        return $datos;
    }

    public function getDatos($variable){
        $totalPeru  = file_get_contents('https://coronavirus-tracker-api.herokuapp.com/'.$variable);
        $jsonPeru  = json_decode($totalPeru);
        $datos = array();
        foreach($jsonPeru->locations as  $data){
            if($data->country == 'Peru'){
                // dd($data->history);
                foreach ($data->history as $key => $value) {
                    $dato = explode('/',$key);
                    $datos[] = array(
                        'mes' => $dato[0],
                        'dia' => $dato[1],
                        'anio' => "20".$dato[2],
                        'cantidad' => $value
                    );
                    // dd($datos);  
                }
            }
        }
        return $datos;
    }

    public function confirmado($tipo){
        switch ($tipo) {
            case 'confirmed':
                $variable = DB::table('confirmado')->where('pais','Peru')->where("contador",">=",'45')->get();
            break;
            case 'deaths':
                $variable = DB::table('muerte')->where('pais','Peru')->where("contador",">=",'45')->get();
            break;
            case 'recovered':
                $variable = DB::table('recuperado')->where('pais','Peru')->where("contador",">=",'45')->get();
            break;
            default:
                $variable = DB::table('confirmado')->where('pais','Peru')->where("contador",">=",'45')->get();
            break;
        }
        $datos = array();
        foreach ($variable as $key => $value) {
            $dato = explode('/',$value->fecha);
            $datos[] = array(
                'mes' => $dato[0],
                'dia' => $dato[1],
                'anio' => "20".$dato[2],
                'cantidad' => $value->total
            );
        }
        // dd($datos);
        return $datos;
    }

    public function viewimport(){
        return view('vistaimport');
    }

    public function importCsv(){
        Datos::truncate();
        Excel::import(new DatosImport,request()->file('file'));
        return back();
    }

    public function imporConfirmadoCsv(){
        Fechareporte::truncate();
        Confirmado::truncate();
        Excel::import(new ConfirmadoImport,request()->file('file'));
        return back();
    }

    public function imporRecuperadoCsv(){
        Recuperado::truncate();
        Excel::import(new RecuperadoImport,request()->file('file'));
        return back();
    }

    public function imporMuertoCsv(){
        Muerte::truncate();
        Excel::import(new MuerteImport,request()->file('file'));
        return back();
    }

    public function departamentos(){
        $totalPeru  = file_get_contents($this->ruta.'countries/PE');
        $jsonTotal = json_decode($total);
    }

    public function importDepartamentoCsv(){
        Excel::import(new DepartamentoImport,request()->file('file'));
        return back();
    }
    

    
}