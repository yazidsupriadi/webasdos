@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Ruangan</h1>
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
              <form action="{{url('/admin/ruangan/store')}}" method="post" >
                @csrf
                <div class="form-group">
                  <label>Kode Ruangan</label>
                  <input type="text" class="form-control" name="kode_ruangan" placeholder="Masukan Nama  Kode Ruangan" value="{{old('kode_ruangan')}}" required>
                </div>
                <div class="form-group">
                  <label>Nama Ruangan</label>
                  <input type="text" class="form-control" name="nama_ruangan" placeholder="Masukan Nama Ruangan" value="{{old('nama_ruangan')}}" required>
                </div>
                
                <div class="form-group">
                  <label>Kapasitas Ruangan</label>
                  <input type="text" class="form-control" name="kapasitas_ruangan" placeholder="Masukan Kapasitas Ruangan" value="{{old('location')}}">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection