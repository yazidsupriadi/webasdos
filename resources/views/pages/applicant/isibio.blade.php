@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Isi Biodata Calon Asisten Dosen</h1>
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
              <form action="{{url('/daftarasdos/isibio')}}" method="post" enctype="multipart/form-data" >
                @csrf
                
                <div class="form-group">
                  <input type="hidden" class="form-control" name="kode" placeholder="Masukan Nama Dosen Mata Kuliah" value="asdos">
                </div>
                <div class="form-group">
                  <label>Nama Calon Asisten Dosen</label>
                  <input type="hidden" class="form-control" name="user_id" placeholder="Masukan Nama Dosen Mata Kuliah" value="{{Auth::user()->id}}">
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Dosen Mata Kuliah" value="{{Auth::user()->name}}" disabled>
                </div>
                
                <div class="form-group">
                  <label>NIM Calon Asisten Dosen</label>
                  <input type="text" class="form-control" name="nim" placeholder="Masukan Nim Anda" >
                </div>
                <div class="form-group">
                  <label>Nomor Handphone</label>
                  <input type="text" class="form-control" name="no_hp" placeholder="Masukan Nomor Handphone " >
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
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="foto">
                </div> 
               
                
                      <div class="form-group">
                  
                  <input type="hidden" class="form-control" name="status" value="inactive">
                </div>
                <div class="form-group">
                  <label>Berkas File Pendaftaran</label>
                  <input type="text" class="form-control" name="berkas" placeholder="Masukan link berkas pendaftaran">
                </div>
           
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection