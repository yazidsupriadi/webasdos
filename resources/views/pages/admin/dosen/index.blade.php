@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Dosen Mata Kuliah</h1>
            <a href="{{url('/admin/dosen/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Daftar Mata Kuliah</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
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