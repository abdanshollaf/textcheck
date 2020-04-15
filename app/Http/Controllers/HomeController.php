<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\uploadModel;
use App\monitoringModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upload = uploadModel::orderBy('id','desc')->Limit(1)->get();
        // echo"<pre>";
        // print_r($upload);
        // echo"</pre>";
        $monitoring = monitoringModel::orderBy('id','desc')->Limit(1)->get();
        return view('menu/dashboard', compact('upload','monitoring'));
    }

    public function logout()
    {
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }
}
