@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Jadwal Praktiukm/h1>
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
              <form action="{{url('/asdos/jadwal-praktikum/store')}}" method="post" >
                @csrf
                <div class="form-group">
                  <label>hari</label>
                  <select name="hari" id="" class="form-control">
                  <option value="">Pilih Hari Praktikum</option>
                  <option value="senin">Senin</option>
                  <option value="selasa">Selasa</option>
                  <option value="rabu">Rabu</option>
                  <option value="kamis">Kamis</option>
                  <option value="jumat">Jumat</option>
                  <option value="sabtu">Sabtu</option>
                  
                  </select>
                </div>
                <div class="form-group">
                  <label>jam</label>
                  <input type="time" class="form-control" name="jam"  value="{{old('location')}}">
                </div>
                <div class="form-group">
                  <label>ruangan</label>
                  <input type="text" class="form-control" name="ruangan" placeholder="Masukan Ruangan Praktek" value="{{old('location')}}">
                </div>
                <div class="form-group">
                  <label>Rekap Absen</label>
                  <input type="text" class="form-control" name="rekap_absen" placeholder="Masukan Link Rekap Absen" value="{{old('location')}}">
                </div>
                <div class="form-group">
                     
                        <label for="slug">Mata Kuliah</label>
                          <select name="matkul_id" class="form-control">
                        
                          
                          <option value="">Pilih mata Kuliah</option>
                              @foreach($matkuls as $item)
                              <option value="{{$item->id}}">{{$item->nama}}</option>
                              @endforeach
                          </select> 
                      </div>
                      <div class="form-group">
                     
                     <label for="slug">Kelas</label>
                       <select name="kelas_id" class="form-control">
                     
                       
                       <option value="">Pilih Kelas</option>
                           @foreach($kelas as $item)
                           <option value="{{$item->id}}">{{$item->kode_kelas}}-({{$item->angkatan}})</option>
                           @endforeach
                       </select>
                   
                   </div>

                   
                   <label for="slug">Asdos</label>
                   <input type="disabled" value="{{Auth::user()->name}}" class="form-control">
                    
                   <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control">
                      
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" cols="15" rows="10"></textarea>
                  </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
         
@endsection