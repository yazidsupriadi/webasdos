@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Dosen Mata Kuliah</h1>
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
              <form action="{{url('/admin/dosen/update',$dosen->id)}}" method="post" >
              @csrf
                @method('PUT')
               
                <div class="form-group">
                  <label>Nama Dosen Mata Kuliah</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Dosen Mata Kuliah" value="{{$dosen->nama}}">
                </div>
                <div class="form-group">
                  <label>NIDN</label>
                  <input type="text" class="form-control" name="nidn" placeholder="Masukan NIDN" value="{{$dosen->nidn}}">
                </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection