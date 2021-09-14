@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')

  
  <!-- Page Heading -->
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4 text-primary bg-primary p-4"> 
            <h1 class="h3 mb-0 text-light">Daftar Dosen Mata Kuliah</h1>
            <a href="{{url('/admin/dosen/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm border-light"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Dosen Mata Kuliah</a>
          </div>
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $dosens->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $dosens->total() }}</p> <br/>
            {{ $dosens->links() }} 
          </div>

          
          <div class="container-fluid">
              <div class="row">
                    
          <div class="input-group col-lg-4 mt-3">
            <form action="/admin/dosen/search" method="get" class="d-inline w-100" >
            <div class="input-group">
              <input type="search" class="form-control rounded" style="font-size:14px;" name="search" placeholder="Cari Berdasarkan Nama Dosen atau NIDN" aria-label="Search"
               aria-describedby="search-addon" />
              <button type="submit" style="font-size:14px;" class="btn btn-outline-primary">search</button>
            </div>
            </form>
          </div>
          
          <div class="input-group col-lg-6 mt-3">
          </div>
          <div class="input-group col-lg-2 mt-3">
            <a href="/admin/dosen" class="btn btn-primary">Lihat Semua Data</a>
          </div>
              </div>
          </div>
  
          


          <a href="/admin/dosen/export_excel" class="btn btn-success my-2 mx-4" target="_blank">EXPORT EXCEL</a>
		
          <!-- Content Row -->
          <div class="row">
            
            <div class="card-body text-gray-800 ">
              
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Dosen</th>
      <th scope="col">NIDN</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($dosens as $dosen)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$dosen->nama}}</td>
      <td>{{$dosen->nidn}}</td>
      <td>
      <a href="{{url('admin/dosen/edit',$dosen->id)}}"  class="btn btn-sm btn-info" title="">Edit</a>

<form action="{{url('admin/dosen/delete',$dosen->id)}}" method="post" class="d-inline">
  @csrf
  @method('delete')
  <button class="btn btn-sm btn-danger"onclick="return confirm('Are you sure?')"></i>Delete</button>
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