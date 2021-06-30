@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Calon Asdos</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Make Asdos</th>
      <th scope="col">Detail</th>
      
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($users as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      
      <td>{{$item->rules}}</td>
    <td>@if($item->rules == 'applicant')
            <a href="{{url('admin/applicant/'.$item->id)}}" class="btn btn-primary btn-sm">Make Asdos</a>
          @else
            <a href="{{url('admin/applicant/'.$item->id)}}" class="btn btn-danger btn-sm ">Make other Rules</a>
         @endif
      </td>
      <td>      <a href="{{url('admin/profileasdos/'.$item->id)}}" class="btn btn-success btn-sm ">Detail</a>
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