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
                     
                  <div class="form-group">
                  <label>Nama Calon Asisten Dosen</label>
                  <input type="hidden" class="form-control" name="user_id" placeholder="Masukan Calon asisten dosen" value="{{Auth::user()->id}}">  
                  <input type="text" class="form-control"  placeholder="Masukan Calon asisten dosen" value="{{Auth::user()->name}}" disabled>
                </div>
                        <label for="slug">Mata Kuliah</label>
                          <select name="matkul_id" class="form-control">
                        
                          
                          <option value="">Pilih Mata Kuliah </option>
                              @foreach($matkuls as $matkul)
                              <option value="{{$matkul->id}}">{{$matkul->nama}}</option>
                              @endforeach
                          </select>
                      
                      </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection