@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')

  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Asdos Mata Kuliah Tidak Aktif</h1>
          </div>
          
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $daftar_asistensi_nonaktif->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $daftar_asistensi_nonaktif->total() }}</p> <br/>
            {{ $daftar_asistensi_nonaktif->links() }} 
            <p> Showing {{($daftar_asistensi_nonaktif->currentpage()-1)*$daftar_asistensi_nonaktif->perpage()+1}} to {{$daftar_asistensi_nonaktif->currentpage()*$daftar_asistensi_nonaktif->perpage()}}
            of  {{$daftar_asistensi_nonaktif->total()}} entries
            </p>
          </div>
          <a href="/admin/daftar-asistensi" class="btn btn-success btn-sm my-3 mx-3">Asistensi Aktif</a>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Asisten Dosen</th>
      <th scope="col">Mata Kuliah</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($daftar_asistensi_nonaktif as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->user->name}}</td>
      <td>{{$item->matkul->nama}}</td>
      <td>@if($item->status == 'active')
                         <span class="badge bg-success text-light ">{{$item->status}}</span>
                        @elseif($item->status == 'inactive')
                        <span class="badge bg-warning text-light">{{$item->status}}</span>
                        @else
                        <span class="badge bg-danger text-light">{{$item->status}}</span>
                     
                      @endif</td> 
                      <td>
                      <a href="{{url('/admin/asdos/update-status-matkul/'.$item->id)}}" style="font-size:10px"class="btn btn-primary btn-sm">Make active</a>
         
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