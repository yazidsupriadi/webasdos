@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Tahun Akademik</h1>
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
              <form action="{{url('/admin/tahun-akademik/store')}}" method="post" >
                @csrf
                <div class="form-group">
                  <label>Kode Tahun Akademik</label>
                  <input type="text" class="form-control" name="kode_tahun_akademik" placeholder="Masukan Kode Tahun Akademik" value="{{old('kode_tahun_akademik')}}">
                </div>
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="text" class="form-control" name="tahun" placeholder="Masukan Tahun Akademik" value="{{old('tahun')}}">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection