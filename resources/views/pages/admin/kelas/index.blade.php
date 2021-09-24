@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Daftar Kelas</h1>
            <a href="{{url('/admin/kelas/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary border-light shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Daftar Kelas</a>
          </div>
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $kelass->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $kelass->total() }}</p> <br/>
            <p> Showing {{($kelass->currentpage()-1)*$kelass->perpage()+1}} to {{$kelass->currentpage()*$kelass->perpage()}}
            of  {{$kelass->total()}} entries
            </p>
            {{ $kelass->links() }} 
          </div>
          <a href="/admin/kelas/export_excel" class="btn btn-sm btn-success my-2 mx-3" target="_blank">EXPORT EXCEL</a>


          <div class="container-fluid">
              <div class="row">
                    
          <div class="input-group col-lg-3 mt-3">
            <form action="/admin/kelas/search/kode" method="get" class="d-inline w-100" >
            <div class="input-group">
              <input type="search" class="form-control rounded" style="font-size:14px;" name="kode_search" placeholder="Cari Berdasarkan Kode Kelas" aria-label="Search"
               aria-describedby="search-addon" />
              <button type="submit" style="font-size:12px;" class="btn btn-outline-primary">search</button>
            </div>
            </form>
          </div>
          
          <div class="input-group col-lg-3 mt-3">
          <form action="/admin/kelas/search/prodi" method="get" class="d-inline w-100" >
            <div class="input-group">
                       <select name="prodi_search" class="form-control" style="font-size:12px;">
                     
                       
                       <option value="">Cari Sesuai Program Studi</option>
                           @foreach(App\Kelas::distinct()->get(['prodi']) as $item)
                           <option value="{{$item->prodi}}">{{$item->prodi}}</option>
                           @endforeach
                       </select> 
         
            <button type="submit" style="font-size:14px;" class="btn btn-outline-primary">search</button>
            </div>
            </form>
         
          </div>
         
          <div class="input-group col-lg-4 mt-3">
          <form action="/admin/kelas/search/tahun-akademik" method="get" class="d-inline w-100" >
            <div class="input-group">
                       <select name="tahun_angkatan_search" class="form-control" style="font-size:12px;">
                     
                       
                       <option value="">Cari Sesuai Tahun Akademik</option>
                           @foreach(App\Kelas::distinct()->get(['tahun_akademik']) as $item)
                           <option value="{{$item->tahun_akademik}}">{{$item->tahun_akademik}}</option>
                           @endforeach
                       </select> 
         
            <button type="submit" style="font-size:14px;" class="btn btn-outline-primary">search</button>
            </div>
            </form>
         
          </div>
          <div class="input-group col-lg-2 mt-3">
            <a href="/admin/kelas" class="btn btn-primary">Lihat Semua Data</a>
          </div>
              </div>
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
      <th scope="col">Tahun Akademik</th>
      <th scope="col">Jumlah Mahasiswa</th>
      <th scope="col">Action</th>
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
      <td>{{$item->tahun_akademik}}</td>
      <td>{{$item->jumlah_mahasiswa}}</td>
      <td>
      <a href="{{url('admin/kelas/edit',$item->id)}}"  class="btn btn-sm btn-info" title="">Edit</a>

<form action="{{url('admin/kelas/delete',$item->id)}}" method="post" class="d-inline">
  @csrf
  @method('delete')
  <button onclick="confirm('yakin untuk menghapus data.?')" class="btn btn-sm btn-danger"></i>Delete</button>
</form>
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