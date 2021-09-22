@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Mata Kuliah</h1>
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
              <form action="{{url('/daftarasdos/isimatkul')}}" method="post" >
                @csrf
                <div class="form-group">
                  <label>Nama Mata Kuliah</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama  Mata Kuliah" value="{{old('title')}}" required>
                </div>
                <div class="form-group">
                  <label>Kode MK</label>
                  <input type="text" class="form-control" name="kodemk" placeholder="Masukan Kode MK" value="{{old('location')}}" required>
                </div>
                <div class="form-group">
                     
                        <label for="slug">Dosen</label>
                          <select name="dosen_id" class="form-control" required>
                        
                          
                          <option value="">Pilih Dosen Pengampu</option>
                              @foreach($dosens as $dosen)
                              <option value="{{$dosen->id}}">{{$dosen->nama}}</option>
                              @endforeach
                          </select>
                      
                      </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" cols="15" rows="10" required></textarea>
                  </div>
                  <div class="form-group">
                  <label>Nama Calon Asisten Dosen</label>
                  <input type="hidden" class="form-control" name="user_id" placeholder="Masukan Calon asisten dosen" value="{{Auth::user()->id}}">  
                  <input type="text" class="form-control"  placeholder="Masukan Calon asisten dosen" value="{{Auth::user()->name}}">
                </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection