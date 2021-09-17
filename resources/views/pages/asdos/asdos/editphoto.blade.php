@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Profile Asdos</h1>
          </div>

          @if($errors ->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>


          @endif
          <!-- Content Row -->
          <div class="card-shadow">
            <div class="card-body">
              <form action="{{url('/asdos/profile/edit-photo',$asdos->id)}}" method="post" enctype="multipart/form-data" >
                @csrf
                
                @method('PUT')
                <div class="form-group">
                  <input type="hidden" class="form-control" name="kode" placeholder="Masukan Nama Dosen Mata Kuliah" value="asdos">
                  
                  <input type="hidden" class="form-control" name="status" value="active">
                </div>
                <div class="form-group">
                  <label>Nama  Asisten Dosen</label>
                  <input type="hidden" class="form-control" name="user_id" placeholder="Masukan Nama Dosen Mata Kuliah" value="{{Auth::user()->id}}">
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Asisten Dosen" value="{{Auth::user()->name}}" disabled>
                </div>
                
                <div class="form-group">
                  <label>NIM </label>
                  <input type="text" class="form-control" name="nim" placeholder="Masukan Nama Asisten Dosen" value="{{$asdos->nim}}" disabled>
                </div>
                
                <div class="form-group">
                  <label>Foto Sebelumnya </label>
                  <img src="{{Storage::url($asdos->foto)}}" alt="" srcset="" width="100px" height="100px" class="ml-4">
                  
                  <label class="ml-4">Foto baru </label>
                  <input type="file" name="foto" >

                </div>
                
              
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </form>
            </div>
          </div>
         
@endsection