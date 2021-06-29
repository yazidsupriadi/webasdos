@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Presensi Asdos</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Asdos</th>
      <th scope="col">Detail Presensi Asdos</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($users as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->name}}</td>
      
    <td>
         <a href="{{url('admin/presensi/detail/'.$item->id)}}" class="btn btn-primary btn-sm">Detail Presensi</a>
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