@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')

  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Asdos</h1>
          </div>
          
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $daftar_asistensi_aktif->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $daftar_asistensi_aktif->total() }}</p> <br/>
            {{ $daftar_asistensi_aktif->links() }} 
            <p> Showing {{($daftar_asistensi_aktif->currentpage()-1)*$daftar_asistensi_aktif->perpage()+1}} to {{$daftar_asistensi_aktif->currentpage()*$daftar_asistensi_aktif->perpage()}}
            of  {{$daftar_asistensi_aktif->total()}} entries
            </p>
          </div>
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
      
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($daftar_asistensi_aktif as $item)
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