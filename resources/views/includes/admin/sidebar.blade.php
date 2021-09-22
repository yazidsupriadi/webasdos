
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">

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
        <a class="nav-link" href="{{url('daftarasdos/daftar-matkul',Auth::user()->id)}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Daftar Mata Kuliah</span></a>
      </li>
    @endif
    
    
    @if(Auth::user()->rules == 'applicant')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('daftarasdos/calon-asdos-bio',Auth::user()->id)}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Biodata Calon Asdos</span></a>
      </li>
    @endif
    
    @if(Auth::user()->rules == 'admin')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      
      @elseif(Auth::user()->rules == 'asdos')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/asdos/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
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
        <a class="nav-link" href="{{url('admin/honor-asdos')}}">
          <i class="fas fa-fw fa-money-bill"></i>
          <span>Honor</span></a>
      </li>
      @elseif(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/gaji')}}">
          <i class="fas fa-fw fa-money-bill"></i>
          <span>Honor</span></a>
      </li>
      @else
     @endif 

      @if(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/matkul')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Mata Kuliah</span></a>
        </li>
      @endif          

      @if(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/kelas')}}">
          <i class="fas fa-fw fa-school"></i>
          <span>Kelas</span></a>
        </li>
      @endif
      @if(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/ruangan')}}">
          <i class="fas fa-fw fa-building"></i>
          <span>Ruangan</span></a>
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

      @if(Auth::user()->rules == 'asdos')
      <li class="nav-item active">
        <a class="nav-link" href="{{url('asdos/profile',Auth::user()->id)}}">
          <i class="fas fa-fw fa-user"></i>
          <span>profile</span></a>
      </li>
      @endif
    


      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      @if(Auth::user()->rules == 'admin')
      <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                     aria-controls="collapseTwo" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Master</h6>
                        @if(Auth::user()->rules == 'admin')
                        <a class="collapse-item" href="/admin/dosen"><i class="fa fa-chalkboard-teacher text-primary"></i> Dosen</a>
                        @endif

                        @if(Auth::user()->rules == 'admin')
                        <a class="collapse-item" href="/admin/matkul"><i class="fa fa-book text-primary"></i> Mata Kuliah</a>
                        @endif

                        @if(Auth::user()->rules == 'admin')
                        <a class="collapse-item" href="/admin/kelas"><i class="fa fa-school text-primary"></i> Kelas</a>
                        @endif

                        
                        @if(Auth::user()->rules == 'admin')
                        <a class="collapse-item" href="/admin/insentif"><i class="fa fa-credit-card text-primary"></i> Insentif</a>
                        @endif

                        
                        @if(Auth::user()->rules == 'admin')
                        <a class="collapse-item" href="/admin/ruangan"><i class="fa fa-building text-primary"></i> Ruangan</a>
                        @endif
                        
                        @if(Auth::user()->rules == 'admin')
                        <a class="collapse-item" href="/admin/tahun-akademik"><i class="far fa-calendar-alt text-primary"></i> Tahun Akademik</a>
                        @endif

                        @if(Auth::user()->rules == 'admin')
                    <a class="collapse-item" href="/admin/testimonial"><i class="fa fa-quote-left text-primary" aria-hidden="true"></i> Testimoni</a>
                        @endif
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                     aria-controls="collapseTwo" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data User Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data User Master</h6>
                        @if(Auth::user()->rules == 'admin')
                        <a class="collapse-item" href="/admin/user"><i class="fa fa-user text-primary"></i> Daftar User</a>
                        <a class="collapse-item" href="/admin/asdos"><i class="fa fa-address-card text-primary"></i> Daftar Asdos</a>
                        <a class="collapse-item" href="/admin/applicant"><i class="fas fa-user-plus text-primary"></i> Daftar Calon Asdos</a>
                        <a class="collapse-item" href="/admin/daftar-asistensi"><i class="fa fa-users text-primary"></i> Daftar Asistensi</a>
                        @endif

                    </div>
                </div>
            </li>
      @endif    
      <!-- Nav Item - Dashboard -->
    
      
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
      
    </ul>
    