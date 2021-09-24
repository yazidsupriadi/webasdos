@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Presensi Asdos</h1>
            <a href="{{url('/asdos/presensi/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm border-light "><i class="fas fa-plus fa-sm text-white-50"></i> Masukan Presensi Asdos</a>
      
          </div>
          
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $presensis->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $presensis->total() }}</p> <br/>
            {{ $presensis->links() }} 
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
      <th scope="col">kelas</th>
      <th scope="col">Tanggal Praktek</th>
      <th scope="col">Pertemuan</th>
      <th scope="col">Rekap Absen</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Tahun Akademik</th>
      <th scope="col">Action</th>
   
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($presensis as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->user->name}}</td>
      <td>{{$item->jadwal_praktek->matkul->nama}}</td>
      <td>{{$item->jadwal_praktek->kelas->kode_kelas}} - {{$item->jadwal_praktek->kelas->angkatan}} </td>
      
      <td>{{date('D , d - M - Y',strtotime($item->tanggal_praktek))}}</td>
      <td>{{$item->pertemuan}}</td>
      @if($item->rekap_absen == null)
                      <td><p class="badge badge-warning text-center">Kosong</p></td>
                      @else
                      <td>  <a  class="btn btn-primary btn-sm " style="font-size:10px;" href="{{$item->rekap_absen}}" target="_blank"> <i class="fa fa-download"></i> Download Rekap Absen</a>
                      @endif
      <td>{{$item->keterangan}}</td>
      <td>{{$item->tahun_akademik->kode_tahun_akademik}}</td>
      <td><form action="{{url('asdos/presensi/presensidelete',$item->id)}}" method="post" class="d-inline">
  @csrf
  @method('delete')
  <button class="btn btn-sm btn-danger">Delete</button>
</form> </td>
    
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