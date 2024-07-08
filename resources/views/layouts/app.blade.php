<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAS - Pakisaji | {{ucwords(strtolower(Request::segment(1)))}} {{ucwords(strtolower(Request::segment(2)))}}</title>
    <link rel="icon" type="image/x-icon" href="{{url('dist/img/apotek.png')}}">
    @include('layouts.custom.custom-css')
    @yield('custom-css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.wrapper.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.wrapper.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')

        <!-- /.content-wrapper -->
        @include('layouts.wrapper.footer')
    </div>
</body>
@include('layouts.custom.custom-js')
@yield('custom-js')
</html>
