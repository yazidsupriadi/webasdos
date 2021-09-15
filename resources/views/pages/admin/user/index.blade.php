@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')

  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar User </h1>
          </div>
          
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $users->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $users->total() }}</p> <br/>
            {{ $users->links() }}
            <p> Showing {{($users->currentpage()-1)*$users->perpage()+1}} to {{$users->currentpage()*$users->perpage()}}
            of  {{$users->total()}} entries
            </p> 
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
      <th scope="col">change status</th>
    
      <th scope="col">Action</th>
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
      <td>@if($item->rules == 'asdos')
            <a href="{{url('admin/user/rules/'.$item->id)}}" class="btn btn-primary btn-sm">Make admin</a>
          @else
            <a href="{{url('admin/user/rules/'.$item->id)}}" class="btn btn-danger btn-sm ">Make other Rules</a>
         @endif
      </td>
      <td>
@if(Auth::check() == $item->name )
    @if(Auth::user()->name == $item->name )

    @else
<form action="{{url('admin/user/delete',$item->id)}}" method="post" class="d-inline">
  @csrf
  @method('delete')
  <button onclick="confirm('yakin untuk menghapus data.?')" class="btn btn-sm btn-danger"></i>Delete</button>
</form>
@endif
 @else

 @endif
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