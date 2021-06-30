@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Insentif</h1>
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
              <form action="{{url('/admin/insentif/update',$insentif->id)}}" method="post" >
              @csrf
                @method('PUT')
                <div class="form-group">
                  <label>Tipe Insentif</label>
                  <input type="text" class="form-control" name="tipe_insentif" placeholder="Masukan Tipe Insentif" value="{{$insentif->tipe_insentif}}">
                </div>

                <div class="form-group">
                  <label>Kategori</label>
                  <input type="text" class="form-control" name="kategori" placeholder="Masukan Kategori" value="{{$insentif->kategori}}">
                </div>
                
             
                <div class="form-group">
                  <label>Nilai</label>
                  <input type="text" class="form-control" name="nilai" placeholder="Masukan nilai" value="{{$insentif->nilai}}">
                </div>
              
              
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection