
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3">
        
        <img class="mt-5 mb-3"src="{{url('backend/img/logo.jpg')}}" alt="Image" width="60px"><br>
        ASDOS NF Website 
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-5">

      @if(Auth::user()->rules == 'admin')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/jadwal-praktikum')}}">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Jadwal Praktikum</span></a>
      </li>
      @else
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/jadwal-praktikum')}}">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Jadwal Praktikum </span></a>
      </li>
      @endif
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('dashboard')}}">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/dosen')}}">
          <i class="fas fa-fw fa-chalkboard-teacher"></i>
          <span>Dosen</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/matkul')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Mata Kuliah</span></a>
      </li>
      
      @if(Auth::user()->rules == 'admin')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/kelas')}}">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Kelas</span></a>
      </li>
      @else
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/kelas')}}">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Kelas</span></a>
      </li>
     @endif 
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/insentif')}}">
          <i class="fas fa-fw fa-money-check"></i>
          <span>Insentif</span></a>
      </li>

      
      @if(Auth::user()->rules == 'admin')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/user')}}">
          <i class="fas fa-fw fa-address-card"></i>
          <span>Data Asdos</span></a>
      </li>
      @endif

    
      

     



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>