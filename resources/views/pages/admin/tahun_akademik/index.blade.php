@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')

  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Daftar Tahun Akademik</h1>
            <a href="{{url('/admin/tahun-akademik/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary border-light shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Tahun Akademik</a>
          </div>
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $tahun_akademik->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $tahun_akademik->total() }}</p> <br/>
            {{ $tahun_akademik->links() }} 
          </div>

          <div class="container-fluid">
              <div class="row">
                    
          <div class="input-group col-lg-4 mt-3">
            <form action="/admin/tahun-akademik/search/tahun" method="get" class="d-inline w-100" >
            <div class="input-group">
              <input type="search" class="form-control rounded" style="font-size:14px;" name="search" placeholder="Cari Berdasarkan Kode Tahun Akademik" aria-label="Search"
               aria-describedby="search-addon" />
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
      <th scope="col">Kode Tahun Akademik</th>
      <th scope="col">Tahun</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($tahun_akademik as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->kode_tahun_akademik}}</td>
      <td>{{$item->tahun}}</td>
      <td>
      <a href="{{url('admin/tahun-akademik/edit',$item->id)}}"  class="btn btn-sm btn-info" title="">Edit</a>

<form action="{{url('admin/tahun-akademik/delete',$item->id)}}" method="post" class="d-inline">
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