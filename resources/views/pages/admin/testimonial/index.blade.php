@extends('layouts.admin')

@section('content')
@include('sweetalert::alert')

  
  <!-- Page Heading -->
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4 text-primary bg-primary p-4"> 
            <h1 class="h3 mb-0 text-light">Testimoni</h1>
            <a href="{{url('/admin/testimonial/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm border-light"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Testimoni</a>
          </div>
          <div class=" card-header d-sm-flex align-items-center justify-content-between mb-4p-4"> 
            <p><i class="fa fa-bookmark text-primary" aria-hidden="true"></i> Halaman : {{ $testimonials->currentPage() }}</p>  <br/>
	          <p><i class="fa fa-calculator text-primary" aria-hidden="true"></i> Jumlah Data : {{ $testimonials->total() }}</p> <br/>
            {{ $testimonials->links() }} 
            <p> Showing {{($testimonials->currentpage()-1)*$testimonials->perpage()+1}} to {{$testimonials->currentpage()*$testimonials->perpage()}}
            of  {{$testimonials->total()}} entries
            </p>
          </div>

          


          <!-- Content Row -->
          <div class="row">
            
            <div class="card-body text-gray-800 ">
              
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Asdos</th>
      <th scope="col">Mata Kuliah</th>
      <th scope="col">Tahun Akademik</th>
      <th scope="col">Foto</th>
      <th scope="col">Testimoni</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
  @forelse($testimonials as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->nama_asdos}}</td>
      <td>{{$item->matkul}}</td>
      <td>{{$item->tahun_akademik}}</td>
      <td><img src="{{Storage::url($item->foto)}}" alt="{{$item->foto}}" srcset="" width="60px" height="60px"></td>
      <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong">
  Testimoni
</button>
    <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Testimoni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$item->testimoni}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</td>
      <td>
      <a href="{{url('admin/testimonial/edit',$item->id)}}"  class="btn btn-sm btn-info" title="">Edit</a>

<form action="{{url('admin/testimonial/delete',$item->id)}}" method="post" class="d-inline">
  @csrf
  @method('delete')
  <button class="btn btn-sm btn-danger"onclick="return confirm('Are you sure?')"></i>Delete</button>
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