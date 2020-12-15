@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Jadwal Praktikum</h1>
            <a href="{{url('/admin/jadwal-praktikum/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Insentif</a>
          </div>

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
                      <th scope="col">Rekap Absen</th>
                      <th scope="col">Mata Kuliah</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Asdos</th>
                      
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i = 1 ?>
                  @forelse($jadwals as $item)
                    @if($item->hari == 'senin')
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$item->hari}}</td>
                      <td>{{date('H:i:s',strtotime($item->jam))}}</td>
                      <td>{{$item->ruangan}}</td> 
                      <td>{{$item->rekap_absen}}</td>
                      <td>{{$item->matkul->nama}}</td>
                      <td>{{$item->kelas->kode_kelas}}-{{$item->kelas->angkatan}}</td>
                      <td>{{$item->user->name}}-{{$item->kelas->angkatan}}</td>
                      
                      <td>
                      <a href="{{url('admin/jadwal-praktikum/edit',$item->id)}}"  class="btn btn-sm btn-info" title="">Edit</a>

                <form action="{{url('admin/jadwal-praktikum/delete',$item->id)}}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-sm btn-danger"></i>Delete</button>
                </form>
                      </td>
                    </tr>
                    @endif
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
          <div class="container">
          <div class="row">
            <div class="card-body text-gray-800">
              
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Hari</th>
                      <th scope="col">Jam</th>
                      <th scope="col">Ruangan</th>
                      <th scope="col">Rekap Absen</th>
                      <th scope="col">Mata Kuliah</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Asdos</th>
                      
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i = 1 ?>
                  @forelse($jadwals as $item)
                    @if($item->hari == 'selasa')
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$item->hari}}</td>
                      <td>{{date('H:i:s',strtotime($item->jam))}}</td>
                      <td>{{$item->ruangan}}</td> 
                      <td>{{$item->rekap_absen}}</td>
                      <td>{{$item->matkul->nama}}</td>
                      <td>{{$item->kelas->kode_kelas}}-{{$item->kelas->angkatan}}</td>
                      <td>{{$item->user->name}}-{{$item->kelas->angkatan}}</td>
                      
                      <td>
                      <a href="{{url('admin/jadwal-praktikum/edit',$item->id)}}"  class="btn btn-sm btn-info" title="">Edit</a>

                <form action="{{url('admin/jadwal-praktikum/delete',$item->id)}}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-sm btn-danger"></i>Delete</button>
                </form>
                      </td>
                    </tr>
                    @endif
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
          </div>
         
@endsection