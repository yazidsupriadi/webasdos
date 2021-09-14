@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')

  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Daftar Jadwal Praktikum</h1>
            <a href="{{url('/admin/jadwal-praktikum/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm border-light"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Jadwal Praktikum</a>
          </div>
          <div class="container-fluid">
            <div class="row">
                
          <div class="input-group col-lg-3 mt-3">

<form action="/admin/jadwal-praktikum/search-by-date" method="get" class="d-inline w-100" >
  <div class="input-group">
             <select name="hari_search" class="form-control" style="font-size:12px;">
           
             
             <option value="">Cari Sesuai Hari Praktikum</option>
                
                 <option value="Senin">Senin</option>
                 <option value="Selasa">Selasa</option>
                 <option value="Rabu">Rabu</option>
                 <option value="Kamis">Kamis</option>
                 <option value="Jumat">Jum'at</option>
                 <option value="Sabtu">Sabtu</option>
             </select> 

  <button type="submit" style="font-size:14px;" class="btn btn-outline-primary">search</button>
  </div>
  </form>

</div>

<div class="input-group col-lg-3 mt-3">
<form action="/admin/jadwal-praktikum/search-by-tahun-akademik" method="get" class="d-inline w-100" >
  <div class="input-group">
             <select name="tahun_akademik_search" class="form-control" style="font-size:12px;">
           
             
             <option value="">Cari Sesuai Tahun Akademik</option>
                 @foreach(App\TahunAkademik::all() as $item)
                 <option value="{{$item->id}}">{{$item->kode_tahun_akademik}}</option>
                 @endforeach
             </select> 

  <button type="submit" style="font-size:14px;" class="btn btn-outline-primary">search</button>
  </div>
  </form>

</div>

            </div>
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
                      <th scope="col">Mata Kuliah</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Tahun Akademik</th>
                      <th scope="col">Asdos</th>
                      <th scope="col">Rekap Absen</th>
                      
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
                      <td>{{$item->ruangan}}</td> 
                      <td>{{$item->matkul->nama}}</td>
                      <td>{{$item->kelas->kode_kelas}}-{{$item->kelas->angkatan}}</td>
                      <td>{{$item->tahun_akademik->kode_tahun_akademik}}</td>
                      <td>{{$item->user->name}}-{{$item->kelas->angkatan}}</td>
                      <td>{{$item->rekap_absen}}</td>
                      
                      <td>
                      
                <form action="{{url('admin/jadwal-praktikum/delete',$item->id)}}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button onclick="confirm('yakin untuk menghapus data.?')"class="btn btn-sm btn-danger"></i>Delete</button>
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