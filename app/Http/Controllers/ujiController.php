<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\uploadModel;
use DB;
use App\ujiModel;
use Exception;
// use PhpOffice\PhpWord\PhpWord;
use App\monitoringModel;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Storage;

class ujiController extends Controller
{   

    public function index($id){
        // $ambil = DB::table('tbl_jurnal')->get();
        $uji = uploadModel::where('id', $id)->get()->first();
        $uji2 = ujiModel::get()->first();
        // $hasil = monitoringModel::orderBy('id','desc')->get()->first();
        $hasil = DB::table('tbl_proses')->get()->first();
        $created = $hasil->created_at;
        $update = $hasil->updated_at;
        $hasiltipo = $hasil->hasil;
        $str_uji = $hasil->abstrak;
        $tipo = str_replace(",", "", $hasil->tipo);
        $str_hasil = $hasil->hasil;
        $tipobaru = $hasil->tipo;
        $lower_uji = strtolower($str_uji);
        $str_uji_arr = preg_split("/[\s,.]/", $lower_uji);
        $str_hsl_arr = preg_split("/[\s,.]/", $str_hasil);
        $str_tipo = explode(' ',$tipo);
        $str_tipo2 = explode(', ',$tipobaru);
        $str_hasil2 = explode(' ',$str_hasil);

        
        // $str_hasil_arr = explode(', ',$str_hsl_arr);
        $filter_uji = array_map('trim',$str_uji_arr);
        $filter_hasil = array_map('trim',$str_hsl_arr);

        

        $result = $this->highlight_words ($lower_uji,$str_tipo2);
        $results = $this->replace_words ($lower_uji,$str_tipo,$str_hasil2);
        // $this->hasilnya = $result;
        // $this->hasil2 = $results;

        // echo"<pre>";
        // print_r($str_tipo2);
        // echo"</pre>";
        
        // DB::table('tbl_uji')->insert([
        //     'abstrak' => $str_uji,
        //     'kata_salah' => $tipobaru,
        //     'koreksi' => $results,
        //     'hasil' => $hasiltipo,
        //     'created_at' => $created,
        //     'updated_at' => $update
        // ]);

        // // Storage::put("hasil1.txt", $result);
        // Storage::put("hasil2.txt", $results);
        // $passing = $this->index($result);
        // $test ='';
        // for ($i=0; $i < count($filter_uji) ; $i++) { 
        //     for ($j=0; $j < count($filter_hasil) ; $j++) { 
        //         if ($filter_uji == $filter_hasil) {
        //             $test = preg_replace("/($filter_hasil)i","<b></b>",$filter_uji);
        //         }
        //     }
        // }
        // echo"<pre>";
        // print_r($result);
        // echo"</pre>";
        // dd($test);

        // $filter_uji ->implode('',' ');

        // $tokenize = $data->abstrak;
        // echo"<pre>";
        // print_r($test);
        // echo"</pre>";
        // $tokenize = $data[0]['abstrak'];
        // Storage::put('file.txt',$tokenize);
        // $tokens = shell_exec('python ../storage/app/toke.py');
        // $results = $tokens;
        // $filters = shell_exec('python ../storage/app/fill.py');
        // $hasil = $filters;
        // $stems = shell_exec('python ../storage/app/ste.py');
        // $dapet = $stems;
        // $metode = shell_exec('python ../storage/app/aww.py');
        // $inihasil = $metode;
        // if ($uji->status == 'done') {
        
        // }

        // $process = shell_exec("python \xampp\htdocs\aww\app\Http\Controllers\test.py 2>&1");
        // $results = $argv[1];
        // echo"<pre>";
        // print_r($process);
        // echo"</pre>";
        
        
        // // 'results','hasil','dapet'
        // return $this->hasilnya;
        return view('menu/ujidata',compact('uji','uji2','result','hasil','results'));
    }

    function highlight_word( $aww, $ahay ) {
        $replace = '<span style="background-color: #ffff00">'.$ahay.'</span>'; // create replacement
        $aww = str_replace( $ahay, $replace, $aww ); // replace content
    
        return $aww; // return highlighted data
    }

    function replace_word( $uhuy, $cihuy ,$test ) {
        // $replace = $test; // create replacement
        $uhuy = str_replace( $cihuy, $test, $uhuy ); // replace content
    
        return $uhuy; // return highlighted data
    }

    function highlight_words( $aww, $ahay ) { // index of color (assuming it's an array)
    
        // loop through words
        // dd($aww, $ahay);
        foreach( $ahay as $word ) {

            $aww = $this->highlight_word( $aww, $word ); // get next color index
        }
    
        return $aww; // return highlighted data
    }

    function replace_words( $uhuy, $cihuy, $test ) { // index of color (assuming it's an array)

        return  str_replace($cihuy, $test, $uhuy); // return highlighted data
    }
    

    public function process($id){
        $data = uploadModel::where('id',$id)->get();
        $tokenize = $data[0]['abstrak'];
        Storage::put('fix.txt',$tokenize);
        // $tokens = shell_exec('python ../storage/app/toke.py');
        // $filters = shell_exec('python ../storage/app/fill.py');
        // $stems = shell_exec('python ../storage/app/ste.py');
        
        $metode = exec('python '.storage_path('app\\aww.py').' >D:\Ngoding\xampp\htdocs\aww\storage\app\aww\hasil.txt 2>&1 &');
        // $default = ini_get('max_execution_time');
        // set_time_limit(1000);
        // if(filter_var(shell_exec('python '.storage_path('app/aww.py').' >/dev/null 2>&1 &'), FILTER_VALIDATE_BOOLEAN));
        return redirect()->route('ujidata',$id);
            // set_time_limit($default);
    }

    public function generateDocx()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        // $name = uploadModel::where('id',$id)->get('namafile')->first();
        // $uji = uploadModel::where('id', $id)->get()->first();
        // $hasil = monitoringModel::orderBy('id','desc')->get()->first();
        // $str_uji = $uji->abstrak;
        // $str_hasil = $hasil->kata_salah;
        // $lower_uji = strtolower($str_uji);
        // $str_uji_arr = preg_split("/[\s,.]/", $lower_uji);
        // $str_hasil_arr = explode(', ',$str_hasil);
        // $filter_uji = array_filter($str_uji_arr);
        // $filter_hasil = array_filter($str_hasil_arr);
        // $data = Storage::get('hasil2.txt');
        $data2 = Storage::get('hasil2.txt');
        
        
        $section = $phpWord->addSection();
        // $section->addText($data);
        $section->addText($data2);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('Hasil.docx'));
        } catch (Exception $e) {
        }
        
        // echo $this->hasilnya;
        // echo"<pre>";
        // print_r($this->hasilnya);
        // echo"</pre>";
        return response()->download(storage_path('Hasil.docx'));
        // return redirect()->route('ujidata',$id);
    }
}
