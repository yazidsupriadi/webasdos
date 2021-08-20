@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between bg-primary p-4 mb-4">
            <h1 class="h3 mb-0 text-light">Daftar Insentif</h1>
            <a href="{{url('/admin/insentif/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm border-light"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Insentif</a>
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