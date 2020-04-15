<?php

namespace App\Http\Controllers;

use App\uploadModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\DocxToTextController;


class masterController extends Controller
{
    public function index(){
        $data = uploadModel::orderBy('id','asc')->paginate(3);
        // echo"<pre>";
        // print_r($data);
        // echo"</pre>";
        return view('menu/masterdata', compact('data'));
    }

    public function add(){
        return view('menu/tambahdata');
    }

    public function store(Request $request){
            $this->validate($request,[
                'penulis' => 'required',
                'judul' => 'required',
                'dokumen' => 'required',
                'dokumen*' => 'mimes:doc,docx' 
            ]);

            if($request->hasFile('dokumen'))
            {
                $dokumen = $request->file('dokumen');
                $name = $dokumen->getClientOriginalName('dokumen');
                $path = $dokumen->move(public_path().'/upload/',$name);
                // $text = (new Doc())->setDoc(public_path().'/upload/'.$name)->text();
                $text = new DocxToTextController($path);
                $convert = $text->convertToText();
                // $text = exec("unzip -p ".$name." word/document.xml | sed -e 's/<[^>]\{1,\}>//g; s/[^[:print:]]\{1,\}//g'");
                // echo"<pre>";
                // print_r($convert);
                // echo"</pre>";
                uploadModel::create([
                    'penulis' => $request['penulis'],
                    'judul' => $request['judul'],
                    'abstrak' => $convert,
                    'namafile' => $name,
                    'path' => $path,
                ]);
            }
            
            // // echo"<pre>";
            // // print_r($name);
            // // echo"</pre>";
            Session::flash('success_msg','File Uploaded');
            return redirect()->route('masterdata');
    }
    public function deletefile($id){
        $del = uploadModel::find($id);
            // echo"<pre>";
            // print_r($del);
            // echo"</pre>";
        $test = unlink($del->path);
        $del->delete();
        Session::flash('danger_msg', 'File deleted successfully!');
        return redirect()->route('masterdata');
    }
}
