  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
 


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              @if(Auth::user()->rules == 'applicant')
                <a class="dropdown-item" href="{{url('daftarasdos/calon-asdos-bio',Auth::user()->id)}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                @elseif(Auth::user()->rules == 'asdos')
                <a class="dropdown-item" href="{{url('asdos/profile',Auth::user()->id)}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                @else

                @endif

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>
          @auth
          <!--mobile button-->
            <form class="form-inline d-sm-block d-md-none" method="POST" action="{{url('logout')}}">
              @csrf
              <button class="btn btn-login my-2 my-sm-0 px-4" type="submit" >Keluar</button>
            </form>
          <!--desktop button-->

            <form class="form-inline my-2 my-lg-0 d-none d-md-block" method="POST" action="{{url('logout')}}">
              @csrf
              <button type="submit" class="btn btn-login my-2 my-sm-0 px-3 btn-danger btn-sm" style="font-size:12px" >Logout</button>
            </form>
      @endauth
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        </nav>