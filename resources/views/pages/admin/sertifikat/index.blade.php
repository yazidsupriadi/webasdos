@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Daftar Sertifikat</h1>
            <a href="{{url('/admin/sertifikat/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary border-light shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Daftar Sertifikat</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">No Sertifikat</th>
      <th scope="col">Nama</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Mata Kuliah</th>
      <th scope="col">Sertifikat File</th>     
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  <tbody>
  <?php $i = 1 ?>
  @forelse($sertifikats as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->no_sertifikat}}</td>
      <td>{{$item->nama}}</td>
      <td>{{$item->jabatan}}</td>
      <td>{{$item->matkul}}</td>
      <td> <a  class="btn btn-primary" href="{!! route('download_sertifikat', $item->sertifikat_file) !!}" download> <i class="fa fa-download"></i> Download Sertifikat</a>
    </td>
      

      <td>
<form action="{{url('admin/sertifikat/delete',$item->id)}}" method="post" class="d-inline">
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