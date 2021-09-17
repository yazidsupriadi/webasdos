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
              <form action="{{url('/asdos/profile/edit',$asdos->id)}}" method="post" >
                @csrf
                
                @method('PUT')
                <div class="form-group">
                  <input type="hidden" class="form-control" name="kode" placeholder="Masukan Nama Dosen Mata Kuliah" value="asdos">
                  
                  <input type="hidden" class="form-control" name="status" value="active">
                </div>
                <div class="form-group">
                  <label>Nama Asisten Dosen</label>
                  <input type="hidden" class="form-control" name="user_id" placeholder="Masukan Nama Dosen Mata Kuliah" value="{{Auth::user()->id}}">
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Asisten Dosen" value="{{Auth::user()->name}}">
                </div>
                
                <div class="form-group">
                  <label>NIM </label>
                  <input type="text" class="form-control" name="nim" placeholder="Masukan Nama Asisten Dosen" value="{{$asdos->nim}}">
                </div>
                
                <div class="form-group">
                  <label>No Handphone</label>
                  <input type="text" class="form-control" name="no_hp" placeholder="Masukan Nama Asisten Dosen" value="{{$asdos->no_hp}}">
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" name="birthday_place" placeholder="Masukan Tempat lahir" value="{{$asdos->birthday_place}}">
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="form-control" name="birthday" value="{{ old('birthday', date('Y-m-d')) }}" >
                </div>
              
                <div class="form-group">
                  <label>Angkatan</label>
                  <input type="text" class="form-control" name="angkatan" placeholder="masukan tahun angkatan kamu"  value="{{$asdos->angkatan}}">
                </div>
                
                <div class="form-group">
                  <label>Username ELEN</label>
                  <input type="text" class="form-control" name="username_elen" placeholder="masukan username elen"  value="{{$asdos->username_elen}}">
                </div>
                
                <div class="form-group">
                  <label>Nama Bank</label>
                  <input type="text" class="form-control" name="bank" placeholder="Masukan Nama Bank" value="{{$asdos->bank}}" required>
                </div>
                
                <div class="form-group">
                  <label>No Rekening</label>
                  <input type="text" class="form-control" name="norek" placeholder="Masukan Nomor Rekening" value="{{$asdos->norek}}" required>
                </div>
                
                <div class="form-group">
                  <label>No Rekening Atas Nama</label>
                  <input type="text" class="form-control" name="atasnama" placeholder="Masukan Atas Nama Nomor Rekening" value="{{$asdos->atasnama}}" required>
                </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection