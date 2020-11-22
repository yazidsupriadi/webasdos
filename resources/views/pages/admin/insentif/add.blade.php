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
              <form action="{{url('/admin/insentif/store')}}" method="post" >
                @csrf
                <div class="form-group">
                  <label>Tipe Insentif</label>
                  <input type="text" class="form-control" name="tipe_insentif" placeholder="Masukan Tipe Insentif" value="{{old('title')}}">
                </div>

                <div class="form-group">
                  <label>Kategori</label>
                  <input type="text" class="form-control" name="kategori" placeholder="Masukan Kategori" value="{{old('location')}}">
                </div>
                
             
                <div class="form-group">
                  <label>Nilai</label>
                  <input type="text" class="form-control" name="nilai" placeholder="Masukan nilai" value="{{old('location')}}">
                </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection