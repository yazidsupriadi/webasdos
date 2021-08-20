@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between bg-primary text-white p-3 mb-4">
            <h1 class="h3 mb-0 text-white-800">Daftar Kelas</h1>
          </div>
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $kelass->currentPage()}}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $kelass->total() }}</p> <br/>
            {{ $kelass->links() }} 
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
              <table id="data_asdos_kelas" class="table">
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
          <script>
    $(document).ready(function() {
    $('#data_asdos_kelas').DataTable();
} );
@endsection