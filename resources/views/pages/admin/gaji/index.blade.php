@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
          @foreach($user as $item)
            <h1 class="h3 mb-0 text-light">Informasi Honor Asdos : {{$item->name}}</h1>
          @endforeach
          </div>
          <table class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col" class="text-center">Bank</th>
                      <th scope="col" class="text-center">No Rekening</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i = 1;?>
                  @forelse($asdos as $item)
                    <tr>
                      <td class="text-center">{{$item->bank}}</td>
                      <td class="text-center"> {{$item->norek}} a/n {{$item->atasnama}}</td>
                      
                    </tr>
                    @empty
                            <tr>
                                <td class="text-center" colspan="7">Data Kosong</td>
                          </tr> 
                  
                    @endforelse
                    
                  </tbody>
                </table>
          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">

                
                <table class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Bulan</th>
                      <th scope="col">Jumlah Insentif </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i = 1;?>
                  @forelse($total_gajis as $item)
                    <tr>
                  <?php $monthNum = $item->month;
              $dateObj = DateTime::createFromFormat('!m', $monthNum);
              $monthName = $dateObj->format('F');?>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$monthName}} {{$item->year}}</td>
                      <td>{{$item->total_amount}}</td>
                      
                    </tr>
                    @empty
                            <tr>
                                <td class="text-center" colspan="7">Data Kosong</td>
                          </tr> 
                  
                    @endforelse
                    
                  </tbody>
                </table>
              <h3 style="margin-bottom:45px;margin-top:45px;text-align:center;background:blue; color:white; padding:20px 45px;">Detail Gaji Asisten Dosen</h3>              
              
              @foreach($user as $item)
              <form action="{{url('/admin/gaji/export_excel_asdos/'.$item->id)}}" method="get">
              <div class="form-row">
              <div class="col-sm-3 my-1">
      <label class="sr-only" for="inlineFormInputGroupUsername">Tahun</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">Tahun</div>
        </div>
        <input type="text" class="form-control" value="{{date('Y')}}" id="inlineFormInputGroupUsername" name="tahun" placeholder="Masukan Nilai Tahun">
      </div>
    </div>
              <select name="bulan" class="form-select p-1 ml-3">
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
              @endforeach
                  
              <table class="table mt-3">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kode Gaji</th>
                      <th scope="col">Bulan</th>
                      <th scope="col">Jumlah Insentif </th>
                      <th scope="col">Jenis Praktikum </th>
                      
                      <th scope="col">Asdos</th>
                     
                      <th scope="col">Status </th>
                     <th scope="col">Action</th> 
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i = 1; 
                  $total_gaji = 0;
                  ?>
                  @forelse($gajis as $item)
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$item->kode_gaji}}</td>
                      <td>{{$item->bulan_gaji}}</td>
                      <td>{{$item->total}}</td> 
                      <td>{{$item->insentif->tipe_insentif}}</td>
                      <td>{{Auth::user()->name}}</td>
                      <td > @if($item->status == 'accepted')
                         <span class="badge bg-warning text-light">{{$item->status}}</span>
                        @else
                        <span class="badge bg-success text-light">{{$item->status}}</span>
                      @endif
                      </td>
                      <td > @if($item->status == 'accepted')
            <a href="{{url('/admin/honorasdos/updategaji/'.$item->id)}}" class="btn btn-primary btn-sm">Make paid</a>
          @else
            <a href="{{url('/admin/honorasdos/updategaji/'.$item->id)}}" class="btn btn-danger btn-sm ">Make other Status</a>
         @endif</td>
                      
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