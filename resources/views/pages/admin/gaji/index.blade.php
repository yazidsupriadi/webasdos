@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Informasi Honor Asdos (Admin)</h1>
                      
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kode Gaji</th>
                      <th scope="col">Bulan</th>
                      <th scope="col">Jumlah Insentif </th>
                      <th scope="col">Jenis Praktikum </th>
                      
                      <th scope="col">Asdos</th>
                     
                      <th scope="col">Status </th>
                      <th scope="col">Action </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i = 1 ?>
                  @forelse($gajis as $item)
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$item->kode_gaji}}</td>
                      <td>{{$item->bulan_gaji}}</td>
                      <td>{{$item->total}}</td> 
                      <td>{{$item->insentif->tipe_insentif}}</td>
                      <td>{{Auth::user()->name}}</td>
                      <td > <span class="badge bg-success text-light    ">{{$item->status}}</span></td>
                       <td><a href="" class="btn btn-success btn-sm" >Update status honor</a></td>
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