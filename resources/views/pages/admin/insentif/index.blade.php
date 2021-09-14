@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')

  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between bg-primary p-4 mb-4">
            <h1 class="h3 mb-0 text-light">Daftar Insentif</h1>
            <a href="{{url('/admin/insentif/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm border-light"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Insentif</a>
          </div>

          <a href="/admin/insentif/export_excel" class="btn btn-sm btn-success my-2 mx-3" target="_blank">EXPORT EXCEL</a>

          
          <div class="container-fluid">
              <div class="row">
                    
          
          <div class="input-group col-lg-3 mt-3">
          <form action="/admin/insentif/search/tipe-insentif" method="get" class="d-inline w-100" >
            <div class="input-group">
                       <select name="tipe_insentif_search" class="form-control" style="font-size:12px;">
                     
                       
                       <option value="">Cari Sesuai Tipe Insentif</option>
                           @foreach(App\Insentif::distinct()->get(['tipe_insentif']) as $item)
                           <option value="{{$item->tipe_insentif}}">{{$item->tipe_insentif}}</option>
                           @endforeach
                       </select> 
         
            <button type="submit" style="font-size:14px;" class="btn btn-outline-primary">search</button>
            </div>
            </form>
         
          </div>
         
          <div class="input-group col-lg-4 mt-3">
          <form action="/admin/insentif/search/tahun-akademik" method="get" class="d-inline w-100" >
            <div class="input-group">
                       <select name="tahun_akademik_search" class="form-control" style="font-size:12px;">
                     
                       
                       <option value="">Cari Sesuai Tahun Akademik</option>
                           @foreach(App\Kelas::distinct()->get(['tahun_akademik']) as $item)
                           <option value="{{$item->tahun_akademik}}">{{$item->tahun_akademik}}</option>
                           @endforeach
                       </select> 
         
            <button type="submit" style="font-size:14px;" class="btn btn-outline-primary">search</button>
            </div>
            </form>
         
          </div>
          <div class="input-group col-lg-2 mt-3">
            <a href="/admin/insentif" class="btn btn-primary">Lihat Semua Data</a>
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
      <th scope="col">Tipe Insentif</th>
      <th scope="col">Kategori</th>
      <th scope="col">Tahun Akademik</th>
      <th scope="col">Nilai</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($insentifs as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->tipe_insentif}}</td>
      <td>{{$item->kategori}}</td>
      <td>{{$item->tahun_akademik}}</td> 
      <td>{{$item->nilai}}</td>
      
      <td>
      <a href="{{url('admin/insentif/edit',$item->id)}}"  class="btn btn-sm btn-info" title="">Edit</a>

<form action="{{url('admin/insentif/delete',$item->id)}}" method="post" class="d-inline">
  @csrf
  @method('delete')
  <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"></i>Delete</button>
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