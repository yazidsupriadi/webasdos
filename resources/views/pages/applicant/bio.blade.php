@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Profile Calon Asdos</h1>
          </div>

          <!-- Content Row -->
          <div class="container">
          <div class="row">
      
            <div class="card-body text-gray-800">
                <div class="row">
                <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                      
                @foreach($asdos as $item)
                
                <div class="mt-4 ml-4 pb-3">
                     <img style="padding-left:50px;"  width="200px" height="200px" src="{{Storage::url($item->foto)}}" alt="">
                
                </div>
                     @endforeach
                     <div class="mt-4 pb-3">
                <ul>
                
                @foreach($asdos as $item)
                             <h3 class="text-bold text-center" style="list-style:none;font-weight:bold; text-transform: capitalize; font-size:20px"> {{Auth::user()->name}}</h3>   
                 @endforeach
                
                </ul>
                </div>
                </div>  
           
                    
                    </div>
                </div>
                
                 
                <div class="col-lg-8">
                <div class="card">
                    <h5 class="card-header bg-primary text-white">Asdos Profile</h5>
                    <div class="card-body p-5">
                        @foreach($asdos as $item)
                        <p class="card-text">NIM : {{$item->nim}}</p>
                        <p class="card-text">No Handphone: {{$item->no_hp}}</p>
                        <p class="card-text">Email : {{Auth::user()->email}}</p>
                        
                            <p class="card-text">Kode : {{$item->kode}}</p>
                            <p class="card-text">Tempat,Tanggal Lahir :{{ucfirst(strtolower($item->birthday_place))}} , {{date('D -M- Y',strtotime($item->birthday))}}</p>
                            <p class="card-text">Angkatan : {{$item->angkatan}}</p>
                            <p class="card-text">Username ELEN : {{$item->username_elen}}</p>
                            <p>Berkas Pendaftaran</p>
                            <a  class="btn btn-primary" href="{{$item->berkas}}" target="_blank"> <i class="fa fa-download"></i> Download Berkas Pendaftaran</a>

                           
                         @endforeach
           
                    
                    </div>
                </div>
                
                </div>
           
                </div>
            </div>
          </div>
         
          </div>
          <div class="container-fluid">
		
    <!-- Content Row -->
    <div class="row">
    
      
      <div class="card-body text-gray-800 ">
        
       
      <table class="table ">
<thead class="thead-dark bg-primary">
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