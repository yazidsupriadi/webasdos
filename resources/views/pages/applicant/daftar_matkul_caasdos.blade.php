@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Mata Kuliah Calon Asisten Dosen</h1>
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
              <form action="{{url('/daftarasdos/daftar-matkul-caasdos/store',Auth::user()->id)}}" method="post" >
                @csrf
                <div class="form-group">
                     
                  <div class="form-group">
                  <label>Nama Calon Asisten Dosen</label>
                  <input type="hidden" class="form-control" name="user_id" placeholder="Masukan Calon asisten dosen" value="{{Auth::user()->id}}">  
                  <input type="text" class="form-control"  placeholder="Masukan Calon asisten dosen" value="{{Auth::user()->name}}" disabled>
                </div>
                <div class="form-group">
                        <label for="slug">Mata Kuliah</label>
                          <select name="matkul_id" class="form-control" required>
                        
                          
                          <option value="">Pilih Mata Kuliah </option>
                              @foreach($matkuls as $matkul)
                              <option value="{{$matkul->id}}">{{$matkul->nama}}</option>
                              @endforeach
                          </select>
                      
                      </div>

                      <div class="form-group">
                        <label for="slug">Tahun Akademik</label>
                          <select name="tahun_akademik_id" class="form-control" required>
                        
                          
                          <option value="">Pilih Tahun Akademik </option>
                              @foreach($tahun_akademiks as $tahun_akademik)
                              <option value="{{$tahun_akademik->id}}">{{$tahun_akademik->kode_tahun_akademik}}</option>
                              @endforeach
                          </select>
                      
                      </div>
                      <input type="hidden" class="form-control" name="status" placeholder="Masukan Calon asisten dosen" value="inactive">  
             
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection