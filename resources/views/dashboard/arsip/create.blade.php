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
                <li class="breadcrumb-item active">Tambah Data Arsip Surat</li>
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
                                <h3 class="card-title">Tambah Data Arsip Surat</h3>
                            </div>
                            <form action="{{ url('/arsip-surat/store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="no_surat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kategori" class="col-sm-2 col-form-label">Kategori<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="kategori" required>
                                                <option selected disabled>Pilih Kategori</option>
                                                @foreach($data as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="judul" class="col-sm-2 col-form-label">Judul<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="judul">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="file" class="col-sm-2 col-form-label">File Surat (PDF)<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="file-name" readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('file').click();">Browse File...</button>
                                                </div>
                                            </div>
                                            <input type="file" class="d-none" name="file" id="file" accept="application/pdf" required onchange="updateFileNameAndValidate(this)">
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
    <script>
        function updateFileNameAndValidate(input) {
            var fileName = input.files[0].name;
            var fileSize = input.files[0].size / 1024 / 1024; // in MB
    
            document.getElementById('file-name').value = fileName;
    
            if (fileSize > 2) {
                toastr.error('File tidak boleh melebihi 2MB.');
                input.value = ''; // Clear the input
                document.getElementById('file-name').value = ''; // Clear the displayed filename
            }
        }

        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endsection