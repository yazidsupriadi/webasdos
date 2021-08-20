@extends('layouts.admin')

@section('content')
  
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