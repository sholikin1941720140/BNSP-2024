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
                <li class="breadcrumb-item active">Detail Data Arsip Surat</li>
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
                                <h3 class="card-title">Detail Data Arsip Surat</h3>
                            </div>
                            <form action="{{ url('/arsip-surat/update/' .  $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="no_surat" value="{{ $data->no_surat }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="kategori">
                                                <option selected disabled>Pilih Kategori</option>
                                                @foreach($kategori as $k)
                                                    <option value="{{ $k->id }}" {{ $data->kategori_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="judul" value="{{ $data->judul }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="waktu_unggah" class="col-sm-2 col-form-label">Waktu Unggah</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="waktu_unggah" value="{{ \Carbon\Carbon::make($data->updated_at)->format('d F Y H:i:s') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="file" class="col-sm-2 col-form-label">File Surat (PDF)</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="file-name" readonly value="{{ $data->file }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('file').click();">Browse File...</button>
                                                </div>
                                            </div>
                                            <input type="file" class="d-none" name="file" id="file" accept="application/pdf" onchange="updateFileNameAndValidate(this)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            @if($data->file != null)
                                                <iframe id="pdf-preview" style="width: 100%; height: 500px; border: 1px solid #ddd;" src="{{ asset('uploads/' . $data->file) }}"></iframe>
                                            @else
                                                <iframe id="pdf-preview" style="width: 100%; height: 500px; border: 1px solid #ddd;"></iframe>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" align="right">
                                    <a href="{{ url('/arsip-surat') }}" class="btn btn-warning">Kembali</a>
                                    &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-primary">Simpan/Edit</button>
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
        var file = input.files[0];
        var fileName = file.name;
        var fileSize = file.size / 1024 / 1024; // in MB

        document.getElementById('file-name').value = fileName;

        if (fileSize > 2) {
            toastr.error('File tidak boleh melebihi 2MB.');
            input.value = ''; // Clear the input
            document.getElementById('file-name').value = ''; // Clear the displayed filename
            document.getElementById('pdf-preview').src = ''; // Clear the PDF preview
        } else {
            var fileReader = new FileReader();
            fileReader.onload = function() {
                document.getElementById('pdf-preview').src = fileReader.result;
            };
            fileReader.readAsDataURL(file);
        }
    }

    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>
@endsection
