@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Profile Asdos</h1>
          </div>

          <!-- Content Row -->
          <div class="container">
          <div class="row">
      
            <div class="card-body text-gray-800">
                <div class="row">
                <div class="col-lg-3">
                <div class="card">
                    <div class="card-body p-3">
                    @foreach($asdos as $item)
                
                <div class="mt-4 pb-3">
                     <img style="padding-left:50px;"  width="200px" height="200px" src="{{Storage::url($item->foto)}}" alt="">
                
                </div>
                     @endforeach
                       <div class="mt-4 ">
                <ul>
                
                @foreach($asdos as $item)
                <h4 class="text-bold" style="font-size:16px;font-weight:bold;text-align:center;text-transform:capitalize;">Name : {{$item->user->name}}</h4>
                @endforeach
                @if(Auth::user()->rules == 'asdos')
                <a href="{{url('asdos/profile/edit-photo',Auth::user()->id)}}" class="btn btn-primary btn-sm btn-block">Edit Photo</a>
                       @endif
                
                </ul>
                 <br>
                </div>
                </div>  
           
                    
                    </div>
                </div>
                
                 
                <div class="col-1g-6">
                <div class="card">
                    <h5 class="card-header bg-primary text-white">Asdos Profile</h5>
                    <div class="card-body p-3">
                        @foreach($asdos as $item)
                           
                            <p class="card-text">Kode : {{$item->kode}}</p>
                            <p class="card-text">No Rekening : {{$item->nim}} </p>
                            <p class="card-text">Tempat,Tanggal Lahir :{{ucfirst(strtolower($item->birthday_place))}} , {{date('D -M- Y',strtotime($item->birthday))}}</p>
                            <p class="card-text">Angkatan : {{$item->angkatan}}</p>
                            <p class="card-text">Username ELEN : {{$item->username_elen}}</p>
                            <p class="card-text">Email : {{$item->user->email}}</p>                
                            <p class="card-text">No Handphone: {{$item->no_hp}}</p>
                            <a  class="btn btn-primary my-3" href="{{$item->berkas}}" target="_blank"> <i class="fa fa-download"></i> Download Berkas Pendaftaran</a>

                            
                
                            @endforeach
                            @if(Auth::user()->rules == 'asdos')
                            <a href="{{url('asdos/profile/edit',Auth::user()->id)}}" class="btn btn-primary btn-block">Edit Profile</a>
                @endif
           
                    
                    </div>
                </div>
                
                </div>
                <div class="col-lg-4">
                <div class="card">
                    <h5 class="card-header bg-primary text-white">Asdos Bank Account</h5>
                    <div class="card-body p-3">
                        @foreach($asdos as $item)
                           
                            
                            <p class="card-text">{{$item->bank}}</p>
                            <p class="card-text">No Rekening : {{$item->norek}} a/n {{$item->atasnama}}</p>
                         @endforeach
           
                    
                    </div>
                </div>
                <div class="card mt-3">
                    <h5 class="card-header bg-primary text-white">History Asisten Dosen</h5>
                    
                    <table class="table" style="font-size:12px;">
  <thead class="bg-primary text-white" style="font-size:10px;">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Mata Kuliah</th>
      <th scope="col">Tahun Akademik</th>
      <th scope="col">Status</th>
      
      @if(Auth::user()->rules == 'admin')
      <th scope="col">Action</th>
      @endif
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
                      @if(Auth::user()->rules =='admin')
                      <td > @if($item->status == 'active')
            <a href="{{url('/admin/asdos/update-status-matkul/'.$item->id)}}" style="font-size:10px"class="btn btn-primary btn-sm">Make inactive</a>
           @else
            <a href="{{url('/admin/asdos/update-status-matkul/'.$item->id)}}" style="font-size:8px" class="btn btn-danger btn-sm ">Make active</a>            
         @endif
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
          
           
                </div>
          </div>
         
          </div>
          
@endsection