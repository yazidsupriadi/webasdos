@extends('layouts.admin')

@section('content')
  
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary p-4">
            <h1 class="h3 mb-0 text-light">Sertifikat Asdos</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body text-gray-800">
              
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">No Sertifikat</th>
      <th scope="col">Nama</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Mata Kuliah</th>
      <th scope="col">Sertifikat File</th>     

    </tr>
  </thead>
  
  <tbody>
  <?php $i = 1 ?>
  @forelse($sertifikats as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->no_sertifikat}}</td>
      <td>{{$item->nama}}</td>
      <td>{{$item->jabatan}}</td>
      <td>{{$item->matkul}}</td>
      <td> <a  class="btn btn-primary" href="{!! route('download_sertifikat', $item->sertifikat_file) !!}" download> <i class="fa fa-download"></i> Download Sertifikat</a>
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