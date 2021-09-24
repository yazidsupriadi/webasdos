@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="jumbotron bg-primary text-light">
           <h1 class="display-4 text-center">Selamat datang di website asisten dosen STT Nurul Fikri </h1>
          </div>
          
          <!-- Content Row -->
          <div class="row">
      
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mata Kuliah</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($matkul)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Dosen</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($dosen)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kelas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($kelas)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                      <!-- Earnings (Monthly) Card Example -->
                      <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ruangan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($ruangan)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hotel fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Asdos</div>
                      
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($user)}}</div>
                   
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @if(Auth::user()->rules == 'asdos')
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Presensi</div>
                      
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($presensi)}}</div>
                   
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
          
          </div>
          
          <div class="jumbotron-fluid bg-primary text-light p-3 m-3">
           <h3 class="display-6 text-center">Audit Trail</h3>
          </div>
          <div class="container">
            <div class="row">
            <table class="table" class="mx-5">
              
              <thead class="thead-dark" style="font-size:10px;">
              
              <tr>
                  <th scope="col">No</th>
                  <th scope="col">ID User</th>
                  <th scope="col">Type User</th>
                  <th scope="col">Event</th>
                  <th scope="col">Url</th>
                  <th scope="col">IP Address</th>
                  <th scope="col">User Agent</th>
                  <th scope="col">Tanggal Dibuat</th>
                </tr>
              </thead>
              <tbody style="font-size:10px;">
              <?php $i = 1 ?>
              @forelse($audits as $item)
                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>{{$item->user_id}}</td>
                  <td>{{$item->user_type}}</td>
                  <td>{{$item->event}}</td>
                  <td>{{$item->url}}</td>
                  <td>{{$item->ip_address}}</td>
                  <td>{{$item->user_agent}}</td>
                  <td>{{$item->created_at}}</td>
                  
                  
                </tr>
               
                @empty
                        <tr>
                            <td class="text-center" colspan="7">Data Kosong</td>
                       </tr> 
                @endforelse
              </tbody>
            </table>
            </div>
          </div>
        
         
@endsection