@extends('layouts.app')

@section('custom-css')
<style>
    .about-content {
        display: flex;
        /* align-items: center; */
        /* justify-content: center; */
    }
    .about-content img {
        margin-right: 20px;
        border-radius: 8px;
        border: 1px solid #ced4da;
    }
    .about-details b {
        display: inline-block;
        width: 180px;
    }
    @media (max-width: 768px) {
        .about-content {
            flex-direction: column;
            text-align: center;
        }
        .about-content img {
            margin: 0 auto 50px;
        }
        .about-details {
            text-align: left;
        }
    }
</style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>About</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">About</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        {{-- <div class="row justify-content-center"> --}}
            <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">About</h3>
                </div>
                <div class="card-body">
                <div class="about-content">
                    <div>
                    <img src="{{ asset('dist/img/aku.jpeg')}}" alt="Profile Picture" width="150" height="150" style="object-fit: cover;">
                    </div>
                    <div class="about-details">
                    <b>Aplikasi ini dibuat oleh</b> <br>
                    <b>Nama</b> : Sholikin<br>
                    <b>Prodi</b> : D4 - Teknik Informatika<br>
                    <b>NIM</b> : 1941720140<br>
                    <b>Tanggal</b> : 09 Juli 2024<br>
                    </div>
                </div>
                </div>
            </div>
            </div>
        {{-- </div> --}}
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('custom-js')

@endsection
