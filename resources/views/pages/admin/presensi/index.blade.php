@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Presensi Asdos</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800 col-sm-12">
              
              <table class="table text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Asdos</th>
      <th scope="col">Mata Kuliah</th>
      <th scope="col">Tanggal Praktek</th>
      <th scope="col">Pertemuan</th>
      <th scope="col">Rekap Absen</th>
      <th scope="col">Keterangan</th>
   
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($presensis as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->user->name}}</td>
      <td>{{$item->jadwal_praktek->matkul->nama}}</td>
      
      <td>{{date('D , d - M - Y',strtotime($item->tanggal_praktek))}}</td>
      <td>{{$item->pertemuan}}</td>
      <td>
    </td>
    
    </tr>
   
    @empty
            <tr>
                <td class="text-center" colspan="7">Data Kosong</td>
           </tr> 
    @endforelse
  </tbody>
</table>


              </div>
            </div>
          </div>
         
@endsection