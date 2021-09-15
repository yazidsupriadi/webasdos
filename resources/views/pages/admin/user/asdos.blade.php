@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')

  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Asdos</h1>
          </div>
          
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $users->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $users->total() }}</p> <br/>
            {{ $users->links() }} 
            <p> Showing {{($users->currentpage()-1)*$users->perpage()+1}} to {{$users->currentpage()*$users->perpage()}}
            of  {{$users->total()}} entries
            </p>
          </div>
          <a href="/admin/asdos/export_excel" class="btn btn-sm btn-success my-2 mx-3" target="_blank">EXPORT EXCEL</a>

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