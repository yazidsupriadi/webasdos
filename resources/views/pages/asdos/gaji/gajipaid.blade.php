@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Informasi Honor Asdos Telah Dibayar</h1>
          
          </div>

          <a href="/asdos/gaji" class="btn btn-warning p-2 mx-3 my-2">Honor Accepted</a>
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
                  
                  <?php $i = 1; 
                  ?>
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
                <table class="table mt-3">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kode Gaji</th>
                      <th scope="col">Bulan</th>
                      <th scope="col">Jumlah Insentif </th>
                      
                      <th scope="col">Detail Presensi </th>
                      <th scope="col">Jenis Praktikum </th>
                      
                      <th scope="col">Asdos</th>
                     
                      <th scope="col">Status Pembayaran </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            {{ $gajis->links() }} 
          </div>
                  <?php $i = 1; 
                  $total_gaji = 0;
                  ?>
                  @forelse($gajis as $item)
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$item->kode_gaji}}</td>
                      <td>{{$item->bulan_gaji}}</td>
                      <td>{{$item->total}}</td> 
                      
                      <td><a  href="{{url('/asdos/gaji/detail/presensi',$item->presensi_id)}}" class="btn btn-primary mx-2 ">detail</a></td>                  
                    
                      <td>{{$item->insentif->tipe_insentif}}</td>
                      <td>{{$item->user->name}}</td>
                      <td >  @if($item->paid == 'Y')
                         <span class="badge bg-success text-light">Paid</span>
                        @else
                        <span class="badge bg-warning text-light">Not Paid</span>
                      @endif</td>
                    </tr>
                    @empty
                            <tr>
                                <td class="text-center" colspan="7">Data Kosong</td>
                          </tr> 
                  
                    @endforelse
                    
                    @foreach($gajis as $item)
                    <?php $total_gaji += $item->total ?>
                    
                    @endforeach
                    <tr>
                    <td colspan="5"></td>
                    <td class="bg-primary text-white">Total Gaji</td>
                    <td>
                      {{$total_gaji}}
                    </td>
                    </tr>
                    
                  </tbody>
                </table>

              </div>
            </div>
          </div>
         
@endsection