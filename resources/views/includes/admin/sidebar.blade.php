
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3">
        
        <img class="img-fluid mt-5 mb-1 " height="200px" src="{{url('backend/img/logo1.png')}}" alt="Image" width="60px"><br>
        ASDOS NF Website 
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-5">

      @if(Auth::user()->rules == 'applicant')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('daftarasdos/isibio')}}">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Isi Bio</span></a>
      </li>
    @endif
    
    @if(Auth::user()->rules == 'applicant')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('daftarasdos/calon-asdos-bio',Auth::user()->id)}}">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Biodata Calon Asdos</span></a>
      </li>
    @endif
    
    @if(Auth::user()->rules == 'admin')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('dashboard')}}">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Dashboard</span></a>
      </li>
      
      @elseif(Auth::user()->rules == 'asdos')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/asdos/dashboard')}}">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Dashboard</span></a>
      </li>
      
      @endif

      @if(Auth::user()->rules == 'admin')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/jadwal-praktikum')}}">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Jadwal Praktikum</span></a>
      </li>
      @elseif(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/jadwal-praktikum')}}">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Jadwal Praktikum </span></a>
      </li>
      @else

      @endif
      
      @if(Auth::user()->rules == 'admin')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/asdos-presensi')}}">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Presensi</span></a>
      </li>
      @elseif(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/presensi')}}">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Presensi</span></a>
      </li>
      @else

      @endif      

      @if(Auth::user()->rules == 'admin')
      
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/dosen')}}">
          <i class="fas fa-fw fa-chalkboard-teacher"></i>
          <span>Dosen</span></a>
      </li>
      @endif

      @if(Auth::user()->rules == 'admin')
      
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/matkul')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Mata Kuliah</span></a>
      </li>
      @elseif(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/matkul')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Mata Kuliah</span></a>
      </li>
      @else

     @endif 
      @if(Auth::user()->rules == 'admin')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/kelas')}}">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Kelas</span></a>
      </li>
      @elseif(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/kelas')}}">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Kelas</span></a>
      </li>
      @else
     @endif 

     @if(Auth::user()->rules == 'admin')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/honor-asdos')}}">
          <i class="fas fa-fw fa-money-bill"></i>
          <span>Honor</span></a>
      </li>
      @elseif(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/gaji')}}">
          <i class="fas fa-fw fa-money-bill"></i>
          <span>Gaji</span></a>
      </li>
      @else
     @endif 

     
     @if(Auth::user()->rules == 'admin')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/insentif')}}">
          <i class="fas fa-fw fa-money-check"></i>
          <span>Insentif</span></a>
      </li>
      @endif

      @if(Auth::user()->rules == 'admin')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/sertifikat')}}">
          <i class="fas fa-fw fa-address-card"></i>
          <span>Sertifikat</span></a>
      </li>
      @endif

      @if(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/sertifikat',Auth::user()->id)}}">
          <i class="fas fa-fw fa-money-check"></i>
          <span>Sertifikat</span></a>
      </li>
      @endif
      
      @if(Auth::user()->rules == 'admin')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/user')}}">
          <i class="fas fa-fw fa-address-card"></i>
          <span>Data User</span></a>
      </li>
      @endif
      @if(Auth::user()->rules == 'admin')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/asdos')}}">
          <i class="fas fa-fw fa-address-card"></i>
          <span>Data Asdos</span></a>
      </li>
      @endif

      @if(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/profile',Auth::user()->id)}}">
          <i class="fas fa-fw fa-money-check"></i>
          <span>profile</span></a>
      </li>
      @endif
    

      @if(Auth::user()->rules == 'admin')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/applicant')}}">
          <i class="fas fa-fw fa-money-check"></i>
          <span>Daftar Calon Asdos</span></a>
      </li>
      @endif

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>