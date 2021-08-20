@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Daftar Mata Kuliah</h1>
            <a href="{{url('/admin/matkul/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary border-light shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Daftar Mata Kuliah</a>
          </div>
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $matkuls->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $matkuls->total() }}</p> <br/>
            {{ $matkuls->links() }} 
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Mata Kuliah</th>
      <th scope="col">Kode MK</th>
      <th scope="col">Dosen Pengampu</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($matkuls as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->nama}}</td>
      <td>{{$item->kodemk}}</td>
      
      <td>{{$item->dosen->nama}}</td>
      <td>@if($item->keterangan == NULL)
            <p>tidak ada</p>
            @else
      {{$item->keterangan}}
      @endif</td>
      
      <td>
      <a href="{{url('admin/matkul/edit',$item->id)}}"  class="btn btn-sm btn-info" title="">Edit</a>

<form action="{{url('admin/matkul/delete',$item->id)}}" method="post" class="d-inline">
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