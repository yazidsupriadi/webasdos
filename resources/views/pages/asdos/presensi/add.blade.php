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
              <form action="{{url('/asdos/presensi/store')}}" method="post" >
                @csrf
                <div class="form-group">
                  <label>Tanggal Praktikum</label>
                  <input type="date" class="form-control" name="tanggal_praktikum"  value="{{old('location')}}">
                </div>
                <div class="form-group">
                  <label>pertemuan</label>
                  <input type="text" class="form-control" name="pertemuan" placeholder="Masukan Ruangan Praktek" value="{{old('location')}}">
                </div>
                <div class="form-group">
                  <label>Rekap Absen</label>
                  <input type="text" class="form-control" name="rekap_absen" placeholder="Masukan Link Rekap Absen" value="{{old('location')}}">
                </div>
                
                 <div class="form-group">
                     
                      
                   
                   <label for="slug">Asdos</label>
                   <input type="disabled" value="{{Auth::user()->name}}" class="form-control" disabled> 
                    
                   <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control">
                      
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" cols="15" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                     
                        <label for="slug">Jadwal Praktikum</label>
                          <select name="jadwal_praktikum_id" class="form-control">
                        
                          
                          <option value="">Pilih Jadwal praktikum</option>
                              @foreach($jadwals as $item)
                              <option value="{{$item->id}}">{{$item->hari}} -  {{$item->matkul->nama}} - {{$item->kelas->kode_kelas}} - {{$item->kelas->angkatan}}</option>
                              @endforeach
                          </select>
                      
                      </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection