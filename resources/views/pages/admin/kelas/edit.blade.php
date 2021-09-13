@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Kelas</h1>
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
              <form action="{{url('/admin/kelas/update',$kelas->id)}}" method="post" >
              @csrf
                @method('PUT')
                <div class="form-group">
                  <label>Kode Kelas</label>
                  <input type="text" class="form-control" name="kode_kelas" placeholder="Masukan Nama  Kode Kelas" value="{{$kelas->kode_kelas}}">
                </div>
                <div class="form-group">
                  <label>Program Studi</label>
                  <input type="text" class="form-control" name="prodi" placeholder="Masukan Program Studi" value="{{$kelas->prodi}}">
                </div>
                
                <div class="form-group">
                  <label>Angkatan</label>
                  <input type="text" class="form-control" name="angkatan" placeholder="Masukan Angkatan" value="{{$kelas->angkatan}}">
                </div>
                <div class="form-group">
                  <label>Tahun Akademik</label>
                  <input type="text" class="form-control" name="tahun_akademik" placeholder="Masukan Tahun Akademik" value="{{$kelas->tahun_akademik}}">
                </div>
                
                <div class="form-group">
                  <label>Jumlah Mahasiswa</label>
                  <input type="text" class="form-control" name="jumlah_mahasiswa" placeholder="Masukan JUmlah Mahasiswa" value="{{$kelas->jumlah_mahasiswa}}">
                </div>
              
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection