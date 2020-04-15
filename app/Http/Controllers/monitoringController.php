<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\monitoringModel;
use Excel;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

// use App\Item;

class monitoringController extends Controller
{
    public function index(){
        $data = monitoringModel::orderBy('id','asc')->paginate(2);
        return view('menu/monitoring',compact('data'));
    }

    public function export(){
        $data = DB::table('tbl_uji')->orderBy('id','asc')->get()->toArray();
        $dataarray[] = array('No','Abstrak','Kata Yang Salah','Koreksi Kata');
        $no = 1;
        foreach($data as $aww){
            $dataarray[] = array(
                'No' => $no++,
                'Abstrak' => $aww->abstrak,
                'Kata Yang Salah' => $aww->kata_salah,
                'Koreksi Kata' => $aww->koreksi 
            );
        }
        Excel::create('Monitoring Pengujian', function($excel) use ($dataarray) {
                $excel->setTitle('Monitoring Pengujian');
                $excel->sheet('Monitoring Pengujian',function($sheet) use ($dataarray){
                    $sheet->fromArray($dataarray,null,'A1',false,false);
                });
            })->download('xlsx');
    }
}
