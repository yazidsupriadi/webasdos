<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="{{url('backend/img/logo1.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('frontend/style/style.css')}}">
    <link rel="stylesheet" href="{{url('frontend/style/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>WEB ASDOS NF</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light border shadow-4 p-3 mb-5 bg-white rounded ">
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
      
                @if(Auth::check())
                
                @if(Auth::user()->rules == 'admin')
                <li class="nav-item mr-3">
                  <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
                
                <form class="nav-item mr-3"  method="POST" action="{{url('logout')}}">
                   @csrf
                  <button type="submit" style="background-color:red;color:white;padding:5px 20px 5px 20px;" class="nav-link" >Keluar</button>
               </form>              
                @elseif(Auth::user()->rules == 'asdos')

                <li class="nav-item mr-3">
                  <a class="nav-link" href="/asdos/presensi">Dashboard</a>
                </li>
                
                <form class="nav-item mr-3"  method="POST" action="{{url('logout')}}">
                   @csrf
                  <button type="submit" style="background-color:red;color:white;padding:5px 20px 5px 20px;" class="nav-link" >Keluar</button>
               </form>              
                @elseif(Auth::user()->rules == 'applicant')
                <li class="nav-item mr-3">
                  <a class="nav-link" style="background-color:blue;color:white;padding:5px 20px 5px 20px;" href="/daftarasdos/isibio">isi Bio</a>
                </li>
                <li class="nav-item mr-3">
                  <a class="nav-link" style="background-color:green;color:white;padding:5px 20px 5px 20px;" href="{{url('daftarasdos/calon-asdos-bio',Auth::user()->id)}}">Bio Applicant</a>
                </li>
                <li class="nav-item-3">
                
                <form class="nav-item mr-3"  method="POST" action="{{url('logout')}}">
                   @csrf
                  <button type="submit" style="background-color:red;color:white;padding:5px 20px 5px 20px;" class="nav-link" >Keluar</button>
               </form>              
                </li>
                @endif

              @else
              <li class="nav-item mr-3">
                  <a class="nav-link" href="/login">Login</a>
                </li>

              @endif
              </ul>
            </div>
        </div>
      </nav>


      <section id="hero" data-aos="fade-up" data-aos-duration="1000">
          <div class="container">
              <div class="row header">
                <div class="col">
                <h3>Selamat Datang di Website Asisten Dosen Nurul Fikri</h3>    
                <p>This website inform you  all activities about lecture Assistant activities such learning activities , news about lecture asistant, and lecture assistant recruitment.</p>
                <button class="btn btn-ptimary btn-lg">Learn More</button>
                </div>
                <div class="col">
                    <img class="img-fluid" src="{{url('backend/img/header.jpg')}}" alt="" srcset="">
              
                </div>
              </div>

              <section id="about-us" style="background-color: rgb(39, 12, 189);" class="text-white border shadow-4 p-3 mb-5  rounded">
        <div class="container-fluid p-3 " id="about">
            <div class="row align-content-center">
              
                <div class="col" data-aos="fade-up" data-aos-duration="1000">
                    <h3 class="text-center text-white">Tentang Website Asisten Dosen Nurul Fikri</h3>
                    <p class="text-center">Website Asisten Dosen Nurul Fikri merupakan platform berupa website yang membantu dosen,asisten dosen, pengelola kampus dan mahasiswa dalam aktivitas Tri Dharma Perguruan Tinggi sehingga dapat meningkatkan produktifitas dalam belajar, bekerja dan berkarya.</p>
                </div>
            </div>
        </div>
      </section>
        
      <div class="row align-items-center pb-3" >
                <div class="col">
                    <h1 class="text-center" style="color: rgb(39, 12, 189);margin-bottom:60px;">Manfaat Menjadi Asisten Dosen</h1>
                </div>  
            </div>

              <div class="row cards" >
                  <div class="col-md-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body" data-aos="fade-right" data-aos-duration="500">
                            <img class="icon" src="https://i.pinimg.com/originals/80/74/17/8074177f317194ce8a6ad2ef4002342b.png" alt="Card image cap">
                            <h5 class="card-title">Pengalaman Mengajar</h5>
                            <p class="card-text" style="font-size:14px">" In this course you will learn how to build a project with react native. you will learn from easy lesson until advance "</p>
                          
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4 d-flex justify-content-center" data-aos="fade-right" data-aos-duration="1000">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <img class="icon" src="https://png.pngtree.com/png-clipart/20190618/original/pngtree-computer-design-programmer-business-office-png-image_3955358.jpg" alt="Card image cap">
                            <h5 class="card-title">Insentif Mengajar</h5>
                            <p class="card-text" style="font-size:14px">" In this course you will learn how to build a project with react native. you will learn from easy lesson until advance "</p>
                          
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4 d-flex justify-content-center ">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body" data-aos="fade-right" data-aos-duration="1500">
                            <img class="icon" src="data:image/png;base64,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PJ5FIeom3PITGj+GFc69KFW5F8c6DKpdx1BMhIoOas3f5UqfD3m43GoM+wj3wvZyuoTq3PG5CfWJc0xLMRHSCg0gdXuo/oy/XJIdQsVydg0FQeh+EIur7rDixMk0LG7hD25NXlNo57jZ5IqL0BG0Phw8efwYETp1KW4NOx+odaf7sF1DPFtMq2rl49mpFfqB5jiKlRDwZvnD2RNEiB9RF5cFL6GwsRn2BSP+3qIinZ3WUP8Xw+dOXcVKSFs60JSf/ifX8G1Rayj0hSj+hxC2a4irtpPpqgUgCuNYwrOteAmxgN787FRttc5ZPdcnowtbA3oE+Lk53gcHAxU7IUqAmuU4qnOg1E1oPBzUJcAJWohQxX5LyPO6oivOruGCjzCzMmiW03X9b+DD3p1XuyvB2a7WxFGO2cfzHIndGbeG3j9Eg781vD+E9Hajs3vfJdxYGelTiViUFKGza4jniazrbyUJ6/5Tz4krIUK8a2i0/riOMw86P2SN1ajHoGJUYoTKtz59txztrF68SixKaQ14pfHx9EOjKcGXGvztTepKxGzqLMO+GYnfXgI3HWIxRcIvEJHDv/tJwlzct41gMhXCZKN/qM2kCZOOjmhWEyRMNjqim03oOZKOj9HsEsIYzcRw8/EMx/cQabzAcU0Twq/AQizWU/k74LGijW4/4dsnApmg7dHR4odM0vAkfF874WRs8UEmZTUmvhgQ43uSBHWv4Vy633RY952vrXsN19J95+vpXsMRERERERERERERERERERERERERERERERERERERERERERERERHFqf8Dl9nyLTbNCq0AAAAASUVORK5CYII=" alt="Card image cap">
                            <h5 class="card-title">Sharing Ilmu dan Pengalaman</h5>
                            <p class="card-text" style="font-size:14px">Dengan menjadi asisten dosen sebagai sarana untuk menbagikan ilmu yang bermanfaat kepada mahasiswa lain</p>
                          
                        </div>
                      </div>
                  </div>
               


              </div>
          </div>
      </section>

      <!-- about us-->



      <!-- Projects-->
      <section id="projects">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="text-center" style="margin-bottom:60px;color: rgb(39, 12, 189);">Testimoni</h1>
                </div>  
            </div>
            
            <div class="row align-items-center">
                <div class="col">
                    <div class="card mb-3" style="width: 15rem;" data-aos="fade-up" data-aos-duration="1000">
                        <img class="card-img-top" src="https://avatars.githubusercontent.com/u/39262811?v=4" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size:16px; font-weight:bold;">Aditya Fitriadi</h5>
                          <p class="card-text" style="color:#999aa4; font-size:14px;" >Basic Programming Lecture Assistant <br> (2018 - 2019)</p>
                          <p class="card-text" style="font-size:14px">"Menjadi asisten dosen menupakan pengalaman yang sangat mengesankan. Selain kita bisa sharing ilmu,pengetahuan saya tentang mata kuliah yang diampu menjadi lebih dalam"</p>
                          
                        </div>
                      </div>
                </div>
                <div class="col">
                    <div class="card mb-3" style="width: 15rem;" data-aos="fade-up" data-aos-duration="1000">
                        <img class="card-img-top" src="https://media-exp1.licdn.com/dms/image/C5603AQGo0ks78YmdHQ/profile-displayphoto-shrink_200_200/0/1615343177902?e=1633564800&v=beta&t=gb4BZNOK03CTmfNyWroi6hCXxWpPcuyCQlftkFKmCnQ" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size:16px; font-weight:bold;">Muhammad Azhar Rasyad</h5>
                          <p class="card-text" style="color:#999aa4; font-size:14px;" >Big Data Lecture Assistant <br> (2020 - 2021)</p>
                          <p class="card-text" style="font-size:14px">" Dengan menjadi asisten dosen saya senang sekali karena kita bisa berinteraksi langsung dengan para mahasiswa,membantu pembelajaran mereka, dan juga pengalaman dalam membantu dosen  "</p>
                          
                        </div>
                      </div>
                </div>
                <div class="col">
                    <div class="card mb-3" style="width: 15rem;"data-aos="fade-up" data-aos-duration="2000">
                        <img class="card-img-top" src="https://skilvul-prod-01.s3.ap-southeast-1.amazonaws.com/webinarSession/speaker/Auzan.jpg" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size:16px; font-weight:bold;">Auzan Assidqi</h5>

                          <p class="card-text" style="color:#999aa4; font-size:14px;" >Data Structure Lecture Assistant <br> (2018 - 2019)</p>
                          <p class="card-text" style="font-size:14px">" Dengan menjadi asisten dosen adalah pengalaman yang sangat berharga bagi saya.Saya banyak belajar tentang bagaimana menyampaikan materi yang baik dan juga management waktu yang baik "</p>
                          
                        </div>
                      </div>
                </div>
                <div class="col">
                    <div class="card mb-3" style="width: 15rem;" data-aos="fade-up" data-aos-duration="3000">
                        <img class="card-img-top" src="https://avatars.githubusercontent.com/u/37898619?v=4" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size:16px; font-weight:bold;">Muhammad Yazid Supriadi</h5>
                          
                          <p class="card-text" style="color:#999aa4; font-size:14px;" >Web Programming Lecture Assistant <br> (2020 - 2021)</p>
                          <p class="card-text" style="font-size:14px">" Menjadi asisten dosen menjadi pengalaman mengajar saya yang pertama.Sangat menyenangkan karena kita bisa membagikan ilmu yang kita pahami sebelumnya "</p>
                          
                        </div>
                      </div>
                </div>
            </div>
            
            
            
      
        </div>
        
      
      </section>

  
      @include('includes.footer')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>