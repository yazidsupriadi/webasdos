@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Presensi</h1>
       
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
              <form action="{{url('/admin/presensi/editpresensi/update',$presensi->id)}}" method="post" >
              @csrf
                @method('PUT')
                <div class="form-group">
                  <label>Tanggal Praktikum</label>
                  <input type="date" class="form-control" name="tanggal_praktek" value="<?php echo date('Y-m-d',strtotime($presensi->tanggal_praktek)) ?>" required>
                </div>
                <div class="form-group">
                  <label>Pertemuan</label>
                  <input type="text" class="form-control" name="pertemuan" placeholder="Masukan Pertemuan asistensi" value="{{$presensi->pertemuan}}" required>
                </div>
                <div class="form-group">
                  <label>Rekap Absen</label>
                  <input type="text" class="form-control" name="rekap_absen" placeholder="Masukan Link Rekap Absen" value="{{$presensi->rekap_absen}}">
                </div>
                
                 <div class="form-group">
                     
                      
                   
                   <label for="slug">Asdos</label>
                   <input type="disabled" value="{{$presensi->user->name}}" class="form-control" disabled> 
                    
                   <input type="hidden" name="user_id" value="{{$presensi->user->id}}" class="form-control">
                      
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" cols="15" rows="10">

                  {{$presensi->keterangan}}
                  
                  </textarea>
                  </div>
                  
                  <div class="form-group">
                     
                        <label for="slug">Tahun Akademik </label>
                          <select name="tahun_akademik_id" class="form-control" required>
                        
                          
                          <option value="">
                  {{$presensi->tahun_akademik->tahun    }}</option>
                              @foreach($tahun_akademik as $item)
                              <option value="{{$item->id}}">{{$item->tahun}}</option>
                              @endforeach
                          </select>
                      
                      </div>
                      <div class="form-group">
                     
                          
                   </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         


          <script>
            function myFunction() {
            var x = document.getElementById("insentif").value;
            document.getElementById("dpinsentif").value = x;
          }</script>
@endsection