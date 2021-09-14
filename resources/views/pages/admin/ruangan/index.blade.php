@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Daftar Ruangan Kelas</h1>
            <a href="{{url('/admin/ruangan/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary border-light shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Ruangan Kelas</a>
          </div>
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $ruangans->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $ruangans->total() }}</p> <br/>
            {{ $ruangans->links() }} 
          </div>
          <a href="/admin/ruangan/export_excel" class="btn btn-sm btn-success my-2 mx-3" target="_blank">EXPORT EXCEL</a>

          <div class="container-fluid">
              <div class="row">
                    
          <div class="input-group col-lg-4 mt-3">
            <form action="/admin/ruangan/search" method="get" class="d-inline w-100" >
            <div class="input-group">
              <input type="search" class="form-control rounded" style="font-size:14px;" name="search" placeholder="Cari Berdasarkan Kode atau Nama Ruangan" aria-label="Search"
               aria-describedby="search-addon" />
              <button type="submit" style="font-size:14px;" class="btn btn-outline-primary">search</button>
            </div>
            </form>
          </div>
          
          <div class="input-group col-lg-6 mt-3">
          </div>
          <div class="input-group col-lg-2 mt-3">
            <a href="/admin/ruangan" class="btn btn-primary">Lihat Semua Data</a>
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
      <th scope="col">Kode Ruangan</th>
      <th scope="col">Nama Ruangan</th>
      <th scope="col">Kapasitas Ruangan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($ruangans as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->kode_ruangan}}</td>
      <td>{{$item->nama_ruangan}}</td>
      <td>{{$item->kapasitas_ruangan}}</td>
      <td>
      <a href="{{url('admin/ruangan/edit',$item->id)}}"  class="btn btn-sm btn-info" title="">Edit</a>

<form action="{{url('admin/ruangan/delete',$item->id)}}" method="post" class="d-inline">
  @csrf
  @method('delete')
  <button onclick="confirm('yakin untuk menghapus data.?')" class="btn btn-sm btn-danger"></i>Delete</button>
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