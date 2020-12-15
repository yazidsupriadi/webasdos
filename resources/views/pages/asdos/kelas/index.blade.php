@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Kelas</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Kelas</th>
      <th scope="col">Prodi</th>
      <th scope="col">Angkatan</th>
      <th scope="col">Jumlah Mahasiswa</th>
      
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($kelass as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->kode_kelas}}</td>
      <td>{{$item->prodi}}</td>
      
      <td>{{$item->angkatan}}</td>
      <td>{{$item->jumlah_mahasiswa}}</td>
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