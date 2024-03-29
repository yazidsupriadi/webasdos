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
                  <input type="date" class="form-control" name="tanggal_praktek" required>
                </div>
                <div class="form-group">
                  <label>Pertemuan</label>
                  <input type="text" class="form-control" name="pertemuan" placeholder="Masukan Pertemuan asistensi" value="{{old('location')}}" required>
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
                     
                        <label for="slug">Tahun Akademik </label>
                          <select name="tahun_akademik_id" class="form-control">
                        
                          
                          <option value="">Pilih Tahun Akademik</option>
                              @foreach($tahun_akademik as $item)
                              <option value="{{$item->id}}">{{$item->tahun}}</option>
                              @endforeach
                          </select>
                      
                      </div>
                      <div class="form-group">
                     
                     <label for="slug">Tipe Praktikum</label>
                       <select name="insentif_id" class="form-control" id="insentif" onchange="myFunction()" >
                     
                       
                       <option >Tipe Praktikum</option>
                           @foreach($insentif as $item)
                           <option value="{{$item->id}}">{{$item->tipe_insentif}}  </option>
                           @endforeach
                       </select>
                       <input type="hidden" name="total" id="dpinsentif" value="">
                       <ol class="mt-4">
                        <li>Kategori Praktikum 1 = kurang dari 35 mahasiswa</li>
                        <li>Kategori Praktikum 2 = kurang 70 mahasiswa</li>
                        <li>Kategori Praktikum 3 = lebih 70 mahasiswa</li>
                        <li>Link and Match</li>
                       </ol>
                    
                       <select name="total" class="form-control" id="insentif" >
                     <option >Kategori</option>
                         @foreach($insentif as $item)
                         <option value="{{$item->nilai}}">{{$item->kategori}} ({{$item->tipe_insentif}})</option>
                         @endforeach
                     </select>
                       <input type="hidden" name="status" value="accepted">
                   
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