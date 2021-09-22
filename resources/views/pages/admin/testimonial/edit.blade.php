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
              <form action="{{url('/admin/testimonial/update',$testimoni->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>Nama Asisten Dosen</label>
                  <input type="text" class="form-control" value="{{$testimoni->nama_asdos}}" name="nama_asdos" placeholder="Masukan Nama Asisten Dosen" value="{{old('title')}}" required>
                </div>
                <div class="form-group">
                  <label>Mata Kuliah</label>
                  <input type="text" class="form-control" value="{{$testimoni->matkul}}" name="matkul" placeholder="Masukan Mata Kuliah" value="{{old('location')}}" required>
                </div>
                
                <div class="form-group">
                  <label>Tahun Akademik</label>
                  <input type="text" class="form-control" value="{{$testimoni->tahun_akademik}}" name="tahun_akademik" placeholder="Masukan Tahun Akademik" value="{{old('location')}}" required>
                </div>
                
                <div class="form-group">
                    
                  <label>Foto Lama</label>
                  <img src="{{Storage::url($testimoni->foto)}}" width="60px" height="60px" alt="" srcset="">
                  <label>Foto Baru</label>
                  <input type="file"  name="foto" value="{{$testimoni->foto}}">
                </div>
                
                <div class="form-group">
                  <label>Testimoni</label>
                  <textarea name="testimoni" class="form-control" cols="30" rows="10">{{$testimoni->testimoni}}</textarea>
                </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection