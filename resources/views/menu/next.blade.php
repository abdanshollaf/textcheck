@extends('layout.layout')
@section('content')
    <div class="right-col" role="main">
    {{-- <form class="" method="POST" action="{{route('post_uji')}}"> --}}
        <div class="page-title">
            <div class="title_left">
                <h3>Form Uji Dokumen</h3>
            </div>
            <div class="title_right">
                <div class="col-md-2 col-sm-12 col-xs-12 form-group pull-right">
                    <a class="btn btn-primary" href="{{route('next')}}">Next  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
        </div>
        <div class="clearfix">
        </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Teks Abstrak Original</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table">
                                <thead>
                                    @foreach($data as $item)
                                    <tr>
                                        <td>
                                            <div>{{$item->abstrak}}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Pengujian Metode <small>Hasil Metode Levenshtein Distance</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table">
                                    <thead>
                                       
                                        <tr>
                                            <td>
                                                <div>{{$inihasil}}</div>
                                            </td>
                                        </tr>
                                        
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        {{-- </form> --}}
</div>
@endsection