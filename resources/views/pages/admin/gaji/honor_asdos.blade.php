@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Honor Asdos</h1>
          </div>
          
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $users->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $users->total() }}</p> <br/>
            {{ $users->links() }} 
          </div>
          <form action="/admin/gaji/export_excel" method="get" class="my-3">
              <div class="form-row">
              <div class="col-sm-3 my-1">
      <label class="sr-only" for="inlineFormInputGroupUsername">Tahun</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">Tahun</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroupUsername" value="{{date('Y')}}" name="tahun" placeholder="Masukan Nilai Tahun">
      </div>
    </div>
              <select name="bulan" class="form-row p-1 ml-3">
                <option value="0">Pilih Bulan</option>
                
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Jali</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm ml-3">Export Laporan Presensi Excel</button>
            
              </div>
            </form>     
          <a href="/admin/gaji/export_excel" class="btn btn-success my-2 mx-4" target="_blank">EXPORT SEMUA DATA HONOR EXCEL</a>
		
          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Asdos</th>
      <th scope="col">Detail Presensi Asdos</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($users as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->name}}</td>
      
    <td>
         <a href="{{url('admin/gaji/detail/'.$item->id)}}" class="btn btn-primary btn-sm">Detail Honor</a>
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