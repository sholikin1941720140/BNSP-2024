@extends('layouts.app')

@section('custom-css')
<!-- Select2 -->
<link rel="stylesheet" href="{{url('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Tambah Data Kategori</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Kategori</h3>
                    </div>
                    <form action="{{ url('/kategori/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Kategori<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" required name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="keterangan"></textarea>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer" align="right">
                        <a href="{{ url('/kategori') }}" class="btn btn-warning">Batal</a>
                        &nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
@endsection


@section('custom-js')
    <script src="{{url('plugins/select2/js/select2.full.min.js')}}"></script>
@endsection