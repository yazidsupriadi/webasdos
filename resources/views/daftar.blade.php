<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASDOS NF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('frontend/style/main.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Heebo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light border shadow-4 p-3 bg-white rounded ">
        <div class="container">
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <a class="navbar-brand" href="#">
                        <img src="{{url('backend/img/logo.jpg')}}" alt="" srcset="">
                        <span id="logo">Asisten Dosen Portal</span>
                    </a>
                </ul>
                <ul class="navbar-nav">
                <li class="nav-item active mr-3">
                  <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mr-3">
                  <a class="nav-link" href="/daftar">Daftar Asdos</a>
                </li>
              
              </ul>
            </div>
        </div>
      </nav>

    
<!-- header -->
<section class="header-kabar" class="text-center ">
    <div class="title-header justify-content-center align-items-center d-flex" data-aos="fade-in"
    
    data-aos-delay="30"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="false"
    data-aos-anchor-placement="top-center">
        <h1 class="hestia-title">
            Daftar Asisten Dosen
         </h1>

    </div> 
</section>
<section class="misi-kabinet mt-5"data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-4">
                <h3 class="text-center mb-3">Pendaftaran Asisten Dosen</h3>
            </div>
            <div class="col-lg-12 col-md-12  col-sm-12">
                <div class="card card-misi ">
                    <div class="misi-title align-items-center justify-content-center" >
                        <span  class="d-flex align-items-center justify-content-center mb-3 mt-3"style="font-size: 60px;"><i class="fas fa-home"></i></span>	
                    </div>
                    <div class="misi-detail ">
                    <h5 class=" justify-content-center align-items-center text-center">Adapun persyaratan untuk mendaftar sebagai asisten dosen sebagai berikut:</h5>
                    <h5 style="margin-left:20px;margin-top:20px;">Persyaratan Umum :</h5>        
                    
                    <ol style=" margin-left:50px;">
                                <li>Bersedia mengikuti rangkaian seleksi selanjutnya (microteaching & interview).</li>
                                <li>Mampu Berkomunikasi dengan baik</li>
                                <li>Bersedia membuat video tutorial praktikum/mengajar sesi live secara online/asistensi tatap muka (secara terbatas) selama masa pandemi</li>
                                <li>Memiliki pengalaman mengajar (lebih disukai).</li>
                            </ol>
                    <h5 style="margin-left:20px;margin-top:20px;">Syarat Pemberkasan :</h5>        
                    
                    <ol style=" margin-left:50px;">
                                <li>Persiapkan Curiculum Vitae</li>
                                <li>Persiapkan Fotocopy KTP</li>
                                <li>Persiapkan Fotocopy KTM</li>
                                <li>Persiapkan Fotocopy KHS(Kartu Hasil Studi) Mata Kuliah Yang Bersangkutan</li>
                                <li>Semua File Berkas Disatukan Dalam Satu File Berbentuk PDF</li>
                          
                            </ol>
                        			
                                    	
                    </div>
                </div>
            
            </div>
          
            
        </div>
    </div>

</section>  


<section class="misi-kabinet mt-5"data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-4">
                <h3 class="text-center mb-3">Alur Pendaftaran Asisten Dosen</h3>
            </div>
            <div class="col-lg-12 col-md-12  col-sm-12">
                <div class="card card-misi ">
                    <div class="misi-title align-items-center justify-content-center" >
                        <span  class="d-flex align-items-center justify-content-center mb-3 mt-3"style="font-size: 60px;"><i class="fas fa-home"></i></span>	
                    </div>
                    <div class="misi-detail justify-content-center align-items-center ">
                    <h5 style="margin-left:20px;margin-top:20px;">Alur Pendaftaran Calon Asisten Dosen :</h5>        
                    
                    <ol style=" margin-left:50px;margin-bottom:30px;">
                                <li>Calon asisten dosen mendaftarkan akun dengan memasukan email dan password</li>
                                <li>Calon asisten dosen mengisi data diri dan mencantumkan berkas pendaftaran sebagai asisten dosen</li>
                                <li>Calon asisten dosen menunggu jadwal interview yang akan dikabarkan lebih lanjut oleh panitia recruitment asisten dosen</li>
                                <li>Calon asisten dosen melakukan interview dengan panitia recruitment</li>
                                <li>Calon asisten dosen menunggu pengumuman yang dapat diakses di link berikut: </li>
                                <li>Calon asisten dosen yang diterima dimohon untuk segera menghubungi dosen yang bersangkutan untuk melakukan micro teaching dan persiapan untuk melakukan asistensi dengan mahasiswa </li>
                            </ol>
                        			
                                        <!-- Button trigger modal -->
                                        <div class="misi-detail align-items-center justify-content-center text-center">
                                        <a href="/daftarasdos"type="button" class="btn btn-primary mb-3 " data-toggle="modal" data-target="#exampleModal">
                                                Daftar
                                        </a>
                                        
               				
                    </div>
                </div>
            
            </div>
          
            
        </div>
    </div>

</section>  




  
	@include('includes.footer')

    
    <script src="./script.js"></script>    
    <script src="frontend/libraries/jquery/jquery-3.4.1.min.js"></script>
    <script src="frontend/libraries/bootstrap/js/bootstrap.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  
</body>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Pintas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('/ceritayuk')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Nama Mahaiswa</label>
                  <input type="text" class="form-control" name="nama_mahasiswa" placeholder="Masukan judul nama buku">
                </div>


                <div class="form-group">
                  <label for="name">NIM</label>
                  <input type="text" class="form-control" name="nim" placeholder="Masukan judul code buku">
                </div>

                    

                <div class="form-group">
                  <label for="name">Angkatan</label>
                  <input type="text" class="form-control" name="angkatan" placeholder="Masukan tahun publikasi">
                </div>

     
     
                <div class="form-group">
                  <label for="name">No Telpon</label>
                  <input type="text" class="form-control" name="no_telpon" placeholder="Masukan judul Banyak halaman buku">
                </div>

     
                <div class="form-group">
                  <label for="name">Yang ingin diaduin</label>
                  <textarea name="aduan" class="form-control" placeholder="masukan deskripsi buku"></textarea>
                </div>

                

                <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
              </form>
        </div>
     
      </div>
    </div>
  </div>
  
              
  
<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tanya Iptek</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('/ceritayuk/tanyaiptek')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Nama Mahaiswa</label>
                  <input type="text" class="form-control" name="nama_mahasiswa" placeholder="Masukan judul nama buku">
                </div>


                <div class="form-group">
                  <label for="name">NIM</label>
                  <input type="text" class="form-control" name="nim" placeholder="Masukan judul code buku">
                </div>

                    

                <div class="form-group">
                  <label for="name">Angkatan</label>
                  <input type="text" class="form-control" name="angkatan" placeholder="Masukan tahun publikasi">
                </div>

     
     
                <div class="form-group">
                  <label for="name">No Telpon</label>
                  <input type="text" class="form-control" name="no_telpon" placeholder="Masukan judul Banyak halaman buku">
                </div>

     
                <div class="form-group">
                  <label for="name">Yang ingin diaduin</label>
                  <textarea name="aduan" class="form-control" placeholder="masukan deskripsi buku"></textarea>
                </div>

                

                <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
              </form>
        </div>
     
      </div>
    </div>
  </div>