@extends('layout.layout')
@section('content')
<div class="">
    
        <div class="page-title">
            @if(Session::has('success_msg'))
            <div class="alert alert-success">{{ Session::get('success_msg') }}</div>  
            @elseif(Session::has('danger_msg'))
            <div class="alert alert-danger">{{ Session::get('danger_msg') }}</div>     
            @endif
          <div class="title_left">
            <h3>Master Data</h3>
          </div>
          <div class="title_right">
            <div class="col-md-2 col-sm-12 col-xs-12 form-group pull-right">
                <a class="btn btn-primary" href="{{route('add')}}"><i class="fa fa-plus-circle"></i> Tambah</a>
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
                <h2>Dokumen Jurnal</h2> 
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <!-- start project list -->
                <table class="table table-striped table-bordered projects">
                  <thead>
                    <tr>
                      <th scope="row">No.</th>
                      <th scope="row">Penulis</th>
                      <th scope="row">Judul</th>
                      <th style="width: 55%" scope="row">Abstrak</th>
                      <th scope="row">Nama File</th>
                      <th scope="row">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr> 
                        <td>
                        <div>{{$item->id}}</div>
                        </td>
                        <td>
                        <div>{{$item->penulis}}</div>
                        </td>
                        <td>
                        <div>{{$item->judul}}</div>
                        </td>
                        <td>
                        <div>{{$item->abstrak}}</div>
                        </td>
                        <td>
                        <div>{{$item->namafile}}</div>
                        </td>
                        <td>
                          <a href="{{route('proses',$item->id)}}" class="btn btn-success btn-sm"><i class="fa fa-external-link"></i> Uji Data</a>
                          <a href="{{route('delete',$item->id)}}" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure to delete?')" type='submit'><i class="fa fa-trash-o"></i> Delete </a>
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