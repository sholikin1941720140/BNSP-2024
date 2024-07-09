<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#1166d8;">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link" style="border-color: white;">
    <img src="{{url('dist/img/pakisaji.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" 
    style="opacity: .8;background-color: white;">
    <span class="brand-text font-weight-light">Arsip Surat</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-color: white;">
      <div class="image" style="opacity: 0">
      User:
      </div>
      <div class="info">
        <a href="/profile" class="d-block">
            <b>{{Auth::user()->name}}</b>
        </a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <a href="/dashboard" class="nav-link d-flex align-items-center">
        <i class="nav-icon fas fa-archive"></i>
        <p class="ml-2">Dashboard</p>
      </a>
      <a href="/arsip-surat" class="nav-link d-flex align-items-center">
        <i class="nav-icon fas fa-archive"></i>
        <p class="ml-2">Arsip Surat</p>
      </a>
      <a href="/kategori" class="nav-link d-flex align-items-center">
        <i class="nav-icon fas fa-archive"></i>
        <p class="ml-2">Kategori</p>
      </a>
      <a href="/about" class="nav-link d-flex align-items-center">
        <i class="nav-icon fas fa-archive"></i>
        <p class="ml-2">About</p>
      </a>
    </nav>  
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>