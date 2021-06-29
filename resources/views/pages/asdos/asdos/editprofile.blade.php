@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Nama Dosen Mata Kuliah</h1>
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
                </div>
                <div class="form-group">
                  <label>Nama Calon Asisten Dosen</label>
                  <input type="hidden" class="form-control" name="user_id" placeholder="Masukan Nama Dosen Mata Kuliah" value="{{Auth::user()->id}}">
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Dosen Mata Kuliah" value="{{Auth::user()->name}}">
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" name="birthday_place" placeholder="Masukan Tempat lahir" value="{{old('birthday_place')}}">
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="form-control" name="birthday">
                </div>
              
                <div class="form-group">
                  <label>Angkatan</label>
                  <input type="text" class="form-control" name="angkatan" placeholder="masukan tahun angkatan kamu">
                </div>
                
                <div class="form-group">
                  <label>Username ELEN</label>
                  <input type="text" class="form-control" name="username_elen" placeholder="masukan username elen">
                </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection