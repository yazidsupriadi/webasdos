@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            
         @forelse($user as $item)
            <h1 class="h3 mb-0 text-light">Detail Presensi Asdos : {{$item->name}}</h1>
          @endforeach
          </div>

          @foreach($user as $item)
          @if($item->id)
              <form action="{{url('/admin/presensi/export_excel_asdos/'.$item->id)}}" method="get">
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
                <option value="">Pilih Bulan</option>
                
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
            <button type="submit" class="btn btn-success btn-sm ml-3">Export Laporan Excel</button>
            
              </div>
            </form>     
            @endif
              @endforeach

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800 col-sm-12">
              
              <table class="table text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Asdos</th>
      <th scope="col">Tanggal Praktek</th>
      <th scope="col">Pertemuan</th>
      <th scope="col">Rekap Absen</th>
      <th scope="col">Status Presensi</th> 
      <th scope="col">Action Status Presensi</th> 
      <th scope="col">Keterangan</th>
      <th scope="col">Action</th>
   
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($presensis as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->user->name}}</td>
      
      <td>{{date('D , d - M - Y',strtotime($item->tanggal_praktek))}}</td>
      <td>{{$item->pertemuan}}</td>
      @if($item->rekap_absen == null)
                      <td><p class="badge badge-warning text-center">Kosong</p></td>
                      @else
                      <td>  <a  class="btn btn-primary btn-sm " style="font-size:10px;" href="{{$item->rekap_absen}}" target="_blank"> <i class="fa fa-download"></i> Download Rekap Absen</a>
                      @endif
                      @if($item->approved == 'Y')
                      <td><p class="badge badge-success text-center">Approved</p></td>
                      @else
                      <td><p class="badge badge-warning text-center">Not Approved</p></td>
                      
                      @endif
                      
                      <td > @if($item->approved == 'N')
            <a href="{{url('/admin/presensi/updatestatusapproval/'.$item->id)}}" class="btn btn-primary btn-sm">Set As Approved</a>
          @else
            <a href="{{url('/admin/presensi/updatestatusapproval/'.$item->id)}}" class="btn btn-danger btn-sm ">Set As Not Approved</a>
         @endif</td>
  
    
                      @if($item->keterangan == null)
                      <td><p class="badge badge-warning text-center">Kosong</p></td>
                      @else
                      <td>  <a  class="btn btn-primary btn-sm " style="font-size:10px;" href="{{$item->rekap_absen}}" target="_blank"> <i class="fa fa-download"></i> Download Rekap Absen</a>
                      @endif

                      <td> <a href="{{url('/admin/presensi/editpresensi/'.$item->id)}}" class="btn btn-success btn-sm">Edit</a>
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