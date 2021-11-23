@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Daftar Jadwal Praktikum</h1>
            <a href="{{url('/asdos/jadwal-praktikum/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm border-light "><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Jadwal Praktikum</a>
      
          </div>
          
          <a href="{{url('/asdos/jadwal-praktikum/pending')}}" class="d-none d-sm-inline-block btn btn-sm btn-success   shadow-sm border-light "><i class="fas fa-calendar fa-sm text-white-50"></i> Request Jadwal Praktek</a>
         
          <a href="{{url('/asdos/jadwal-praktikum')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary   shadow-sm border-light "><i class="fas fa-calendar fa-sm text-white-50"></i>  Jadwal Praktek Active</a>
       
          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Hari</th>
                      <th scope="col">Jam</th>
                      <th scope="col">Ruangan</th>
                      <th scope="col">Mata Kuliah</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Asdos</th>
                      <th scope="col">Rekap Absen</th>
                      
                      <th scope="col">Status Presensi</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i = 1 ?>
                  @forelse($jadwals as $item)
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$item->hari}}</td>
                      <td>{{date('H:i:s',strtotime($item->jam))}}</td>
                      <td>{{$item->ruangan->nama_ruangan}}</td> 
                      <td>{{$item->matkul->nama}}</td>
                      <td>{{$item->kelas->kode_kelas}}-{{$item->kelas->angkatan}}</td>
                      <td>{{$item->user->name}}</td>
                      @if($item->rekap_absen == null)
                      <td><p class="badge badge-warning text-center">Kosong</p></td>
                      @else
                      <td>  <a  class="btn btn-primary btn-sm " style="font-size:10px;" href="{{$item->rekap_absen}}" target="_blank"> <i class="fa fa-download"></i> Download Rekap Absen</a>
                      @endif

                      
                      @if($item->status == 'active')
                      <td><p class="badge badge-success text-center">Active</p></td>
                      @else
                      
                      <td><p class="badge badge-warning text-center">Pending</p></td>
                      @endif
                      <td>

                <form action="{{url('admin/jadwal-praktikum/delete',$item->id)}}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-sm btn-danger"></i>Delete</button>
                </form>
                      </td>
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
          </div>
         
@endsection