@extends('layout.layout')
@section('content')
<div class="row">
  <div class="">
    
    <div class="page-title">
        @if(Session::has('success_msg'))
        <div class="alert alert-success">{{ Session::get('success_msg') }}</div>  
        @elseif(Session::has('danger_msg'))
        <div class="alert alert-danger">{{ Session::get('danger_msg') }}</div>     
        @endif
      <div class="title_left">
        <h3>Data Hasil Pengujian</h3>
      </div>
      <div class="title_right">
        <div class="col-md-2 col-sm-12 col-xs-12 form-group pull-right">
        <a class="btn btn-primary" href="{{route('export')}}"><i class="fa fa-plus-circle"></i> Export</a>
        </div>
      </div>
    </div>
    
    <div class="clearfix">
    </div>
    {{-- @if(!empty($data)) --}}
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Dokumen Monitoring Pengujian Jurnal</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- start project list -->
            <table class="table table-striped table-bordered projects">
              <thead>
                <tr>
                  <th style="width: 4%" scope="row">No.</th>
                  <th style="width: 31%" scope="row">Abstrak</th>
                  <th style="width: 13%" scope="row">Kata Yang Salah</th>
                  <th style="width: 31%" scope="row">Koreksi</th>
                  <th style="width: 10%" scope="row">Di Buat Pada</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr> 
                    <td>
                    <div>{{$item->id}}</div>
                    </td>
                    <td>
                    <div>{{$item->abstrak}}</div>
                    </td>
                    <td>
                    <div>{{$item->kata_salah}}</div>
                    </td>
                    <td>
                    <div>{{$item->koreksi}}</div>
                    </td>
                    <td>
                    <div>{{$item->created_at}}</div>
                    </td>
                  </tr> 
                @endforeach
                
              </tbody>
            </table>
            <div class="page_navigation pull-right">
              {{ $data->links() }}
          </div>
            <!-- end project list -->

          </div>
        </div>
      </div>
    </div>
    {{-- @endif --}}
  </div>
</div>
@endsection