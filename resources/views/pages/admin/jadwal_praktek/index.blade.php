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
                

<form action="/admin/jadwal-praktikum/search-by-date" method="get" class="d-inline w-100 form-inline m-2" >
  <div class="row">
             <select name="hari_search" class="form-control" style="font-size:12px;">
           
             
             <option value="">Cari Sesuai Hari Praktikum</option>
                
                 <option value="Senin">Senin</option>
                 <option value="Selasa">Selasa</option>
                 <option value="Rabu">Rabu</option>
                 <option value="Kamis">Kamis</option>
                 <option value="Jumat">Jum'at</option>
                 <option value="Sabtu">Sabtu</option>
             </select> 
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
          <hr>
          
          <form action="/admin/jadwal-praktikum/export_excel"  method="get">
              <div class="form-row">

              <select name="tahun_akademik" class="form-select p-1 ml-3">
              <option value=""> Pilih Tahun Akademik</option>
              
              @forelse(App\TahunAkademik::all() as $tahun_akademik)
              <option value="{{$tahun_akademik->id}}"> {{$tahun_akademik->kode_tahun_akademik}}</option>
              @empty
              @endforelse
            </select>
            <button type="submit" style="font-size:12px"class="btn btn-success btn-sm ml-3">Export Laporan per Tahun Akademik Excel</button>
            
              </div>
            </form>     
            <a href="{{url('/admin/jadwal-praktikum/pending')}}" class="ml-3 mt-3 d-none d-sm-inline-block btn btn-sm btn-success   shadow-sm border-light "><i class="fas fa-calendar fa-sm text-white-50"></i> Request Jadwal Praktek</a>
         
         <a href="{{url('/admin/jadwal-praktikum')}}" class="mt-3 d-none d-sm-inline-block btn btn-sm btn-primary   shadow-sm border-light "><i class="fas fa-calendar fa-sm text-white-50"></i>  Jadwal Praktek Active</a>
      
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
                      <th scope="col">Status</th>

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
                      <td>{{$item->ruangan->nama_ruangan}}</td> 
                      <td>{{$item->matkul->nama}}</td>
                      <td>{{$item->kelas->kode_kelas}}-{{$item->kelas->angkatan}}</td>
                      <td>{{$item->tahun_akademik->kode_tahun_akademik}}</td>
                      <td>{{$item->user->name}}-{{$item->kelas->angkatan}}</td>
                    
                      <td > @if($item->status == 'pending')
            <a href="{{url('/admin/jadwal-praktikum/updatestatus/'.$item->id)}}" class="btn btn-primary btn-sm">Set As Active</a>
          @else
            <a href="{{url('/admin/jadwal-praktikum/updatestatus/'.$item->id)}}" class="btn btn-warning btn-sm ">Set As Pending</a>
         @endif</td>
  
                      @if($item->rekap_absen == null)
                      <td><p class="badge badge-warning text-center">Kosong</p></td>
                      @else
                      <td>  <a  class="btn btn-primary btn-sm " style="font-size:10px;" href="{{$item->rekap_absen}}" target="_blank"> <i class="fa fa-download"></i> Download Rekap Absen</a>
                      @endif
                    
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