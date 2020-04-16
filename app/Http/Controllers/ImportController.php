<?php

namespace App\Http\Controllers;
use App\Models\{
    Dataperu, Hospitalizado, Testresult, Ubigeo
};
use DB;
use Illuminate\Http\Request;

use App\Imports\{
    DataperuImport, HospitalizadoImport, TestresultImport, UbigeoperuImport
};
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{

    public function importDataperuCsv(){
        Dataperu::truncate();
        Excel::import(new DataperuImport,request()->file('file'));
        return back();
    }

    public function importHospitalizadoCsv(){
        Hospitalizado::truncate();
        Excel::import(new HospitalizadoImport,request()->file('file'));
        return back();
    }

    public function importTestresultCsv(){
        Testresult::truncate();
        Excel::import(new TestresultImport,request()->file('file'));
        return back();
    }

    public function importUbigeoperuCsv(){
        Ubigeo::truncate();
        Excel::import(new UbigeoperuImport,request()->file('file'));
        return back();
    }

    public function viewImport(){
        
        $ubigeoLst = \DB::table('data_ubigeo')->get();
        $ubigeoCount = $ubigeoLst->count();

        $dataLst = \DB::table('data')->get();
        $dataCount = $dataLst->count();

        $hospitalLst = \DB::table('data_detalle_hospitalizados')->get();
        $hospitalCount = $hospitalLst->count();

        $testLst = \DB::table('data_test_results')->get();
        $testCount = $testLst->count();

        return view('import')
            ->with('ubigeo',$ubigeoCount)
            ->with('data',$dataCount)
            ->with('hospital',$hospitalCount)
            ->with('test',$testCount);
    }


}