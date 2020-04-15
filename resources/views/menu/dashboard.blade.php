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
        <h3>Dashboard</h3>
      </div>
    </div>
    
    <div class="clearfix">
    </div>
    {{-- @if(!empty($data)) --}}
    <div class="row">
      <div class="col-md-6">
        <div class="x_panel">
          <div class="x_title">
            <h2>Dokumen Terakhir Di Upload</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- start project list -->
            <table class="table table-striped table-bordered projects">
              <thead>
                <tr>
                  <th style="width: 32%" scope="row">Penulis</th>
                  <th style="width: 32%" scope="row">Judul</th>
                  <th style="width: 32%" scope="row">Terakhir Dibuat</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($upload as $test)
                <tr> 
                    <td>
                    <div>{{$test->penulis}}</div>
                    </td>
                    <td>
                    <div>{{$test->judul}}</div>
                    </td>
                    <td>
                    <div>{{$test->created_at}}</div>
                    </td>
                  </tr> 
                @endforeach
                
              </tbody>
            </table>
            <!-- end project list -->

          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="x_panel">
          <div class="x_title">
            <h2>Dokumen Terakhir Di Uji</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- start project list -->
            <table class="table table-striped table-bordered projects">
              <thead>
                <tr>
                  <th style="width: 32%" scope="row">Kata Yang Salah</th>
                  <th style="width: 32%" scope="row">Kata Hasil Koreksi</th>
                  <th style="width: 32%" scope="row">Terakhir Di Uji</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($monitoring as $item)
                <tr> 
                    <td>
                    <div>{{$item->kata_salah}}</div>
                    </td>
                    <td>
                    <div>{{$item->hasil}}</div>
                    </td>
                    <td>
                    <div>{{$item->created_at}}</div>
                    </td>
                  </tr> 
                @endforeach
                
              </tbody>
            </table>
            <!-- end project list -->

          </div>
        </div>
      </div>
    </div>
    <div class="clearfix">
    </div>
    {{-- @endif --}}
  </div>
</div>
@endsection