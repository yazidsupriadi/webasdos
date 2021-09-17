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
                <a href="{{url('asdos/profile/edit-photo',$item->id)}}" class="btn btn-primary btn-sm btn-block">Edit Profile</a>
                       
                
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
                            <p class="card-text">Email : {{Auth::user()->email}}</p>                
                            <p class="card-text">No Handphone: {{$item->no_hp}}</p>
                            <a href="{{url('asdos/profile/edit',$item->id)}}" class="btn btn-primary btn-block">Edit Profile</a>
                         @endforeach
           
                    
                    </div>
                </div>
                
                </div>
                <div class="col-1g-6">
                <div class="card">
                    <h5 class="card-header bg-primary text-white">Asdos Bank Account</h5>
                    <div class="card-body p-3">
                        @foreach($asdos as $item)
                           
                            
                            <p class="card-text">{{$item->bank}}</p>
                            <p class="card-text">No Rekening : {{$item->norek}} a/n {{$item->atasnama}}</p>
                         @endforeach
           
                    
                    </div>
                </div>
                
                </div>
          
           
                </div>
            </div>
          </div>
         
          </div>
          
@endsection