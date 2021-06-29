@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Informasi Honor Asdos</h1>
          
          </div>

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
                      <td>{{$monthName}}</td>
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
                      <th scope="col">Jenis Praktikum </th>
                      
                      <th scope="col">Asdos</th>
                     
                      <th scope="col">Status </th>
                      
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
                      <td > <span class="badge bg-success text-light    ">{{$item->status}}</span></td>
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