@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')

  
  <!-- Page Heading -->
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4 text-primary bg-primary p-4 "> 
            <h1 class="h3 mb-0 text-light">History Pendaftaran Mata Kuliah</h1>
            <a href="{{url('/daftarasdos/daftar-matkul-caasdos',Auth::user()->id)}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm border-light ml-5 mt-3"><i class="fas fa-plus fa-sm text-white-50"></i> Daftar Mata Kuliah</a>
  
         </div>
          <div class="container-fluid">
            <div class="row">
                
          <div class="col-lg-12 ml-1">
            <div class="card" style="">
  <div class="card-body p-4">
    <h5 class="card-text text-center">Nama Calon Asisten : {{Auth::user()->name}} </h5>
  </div>
</div>
            </div>
            </div>

          </div>
          
     
          <div class="container-fluid">
		
          <!-- Content Row -->
          <div class="row">
          
            
            <div class="card-body text-gray-800 ">
              
             
            <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Mata Kuliah</th>
      <th scope="col">Tahun Akademik</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($history_asdos as $item)
  
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->matkul->nama}}</td>
      <td>{{$item->tahun_akademik->kode_tahun_akademik}}</td>
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