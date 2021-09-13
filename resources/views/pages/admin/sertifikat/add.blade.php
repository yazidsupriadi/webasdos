@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Sertifikat</h1>
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
              <form action="{{url('/admin/sertifikat/store')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                  <label>No Sertifikat</label>
                  <input type="text" class="form-control" name="no_sertifikat" placeholder="Masukan No Sertifikat" value="{{old('title')}}">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Asisten Dosen" value="{{old('location')}}">
                </div>
                
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" placeholder="Masukan Jabatan" value="{{old('location')}}">
                </div>
              
                <div class="form-group">
                  <label>Mata Kuliah</label>
                  <input type="text" class="form-control" name="matkul" placeholder="Masukan Mata Kuliah" value="{{old('location')}}">
                </div>
                <div class="form-group">
                  <label>Tahun Akademik</label>
                  <input type="text" class="form-control" name="tahun_akademik" placeholder="Masukan Mata Kuliah" value="{{old('location')}}">
                </div>
              
                <div class="form-group">
                     
                        <label for="slug">Asdos User</label>
                          <select name="user_id" class="form-control">
                        
                          
                          <option value="">Pilih user</option>
                              @foreach($users as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                          </select> 
                      </div>   
               <div class="form-group">
                  <label>Sertifikat File</label>
                  <input type="file" class="form-control" name="sertifikat_file" >
                </div>
           
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection