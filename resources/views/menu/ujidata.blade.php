@extends('layout.layout')
@section('content')
<div class="right-col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Uji Dokumen</h3>
            </div>
            {{-- <div class="title_right">
                <div class="col-md-2 col-sm-12 col-xs-12 form-group pull-right">
                    <a class="btn btn-primary" href="{{route('next',$data->id)}}">Next  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div> --}}
        </div>
        <div class="clearfix">
        </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Teks Abstrak Original</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" id="meyn">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>
                                        <div>{{$hasil->abstrak}}</div>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Hasil Pemeriksaan<small>Hasil Pengecekan Kata</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>
                                                        <div>
                                                                {!!$result!!}
                                                        </div>
                                                    </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Hasil Pemeriksaan <small> Hasil Koreksi Kesalahan Kata</small></h2>
                                            <div class="title_right">
                                                    <div class="col-md-2 col-sm-12 col-xs-12 form-group pull-right">
                                                        <a class="btn btn-primary" href="{{route('exportword')}}"><i class="fa fa-print"></i> Export</a>
                                                    </div>
                                                </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                {!!$results!!}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
            </div>
    </div>
</div>
@endsection