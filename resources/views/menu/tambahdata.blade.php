@extends('layout.layout')
@section('content')
<div class="right-col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Upload Dokumen</h3>
            </div>
        </div>
        <div class="clearfix">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                        <br/>
                        <form action="{{ route('store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                             {{ csrf_field() }}
                             <div class="form-group">
                                <label for="penulis" class="control-label col-md-3 col-sm03 col-xs-12">Penulis</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="penulis" id="penulis" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="judul" class="control-label col-md-3 col-sm03 col-xs-12">Judul</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="judul" id="judul" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="penulis" class="control-label col-md-3 col-sm03 col-xs-12">Upload Dokumen</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="dokumen" id="dokumen" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </div>
                        </form>
                    </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection