<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mindo Education</title>
    <link
      rel="icon"
      href="//mindoeducation.co.id/storage/images/favicon.png?v=3.1.1"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/font.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/responsive.css')}}" />
    <script
      src="https://kit.fontawesome.com/7fbd04887f.js"
      crossorigin="anonymous"
    ></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Header -->
    <header>
      <!-- Logo Section -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <div class="d-flex justify-content-between w-100" style="margin-top: 10px; margin-bottom: 10px;">
            <a href="/">
              <img src="{{asset('asset/image/logomindo.png')}}" alt="logo-mindo" />                        
            </a>            
              <ul class="navbar-nav mb-2 mb-lg-0 non-responsive-nav">
                <li class="nav-item">
                  <a class="nav-link {{trim(Request::segment(1)) === '' ? 'active' : ''}} font-link mx-3" aria-current="page" href="{{route('index')}}">Beranda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{Request::segment(1) === 'program' ? 'active' : ''}} font-link mx-3" href="{{route('program')}}">Program</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-link mx-3" href="#">Tentang Kami</a>
                </li>
              </ul>                          
            <div class="d-flex non-responsive-nav">
                @guest                    
                    <a href="{{route('login')}}" class="btn btn-custom-outline font-button mx-3">Masuk</a>
                    <a href="{{route('register')}}" class="btn btn-custom font-button">Daftar</a>                          
                @else
                    <p class="mb-0 mx-3 mt-2">{{\Auth::user()->name}}</p>                                        
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-custom-outline font-button">Logout</button>
                    </form>                    
                @endguest              
            </div>
          </div>                        
        </div>        
      </nav>      
      <!-- Hero Section -->                 
    </header>
    <!-- Main Content -->
    @yield('content')
    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row first">
          <div class="col-lg-3 col-md-12 col-sm-12 mt-4">            
            <img src="{{asset('asset/image/logomindowhite.png')}}" alt="">
            <p class="caption2 mb-0">
              Platform edukasi untuk meningkatkan skill dan keahlianmu
            </p>            
            <p class="caption2">
              #JadiLebihTahu
            </p>            
              <h4 class="bold">Tetap Terhubung dengan Kami</h4>
              <div class="social-media-container">
                <a
                  href="https://wa.me/6282217777616"
                  target="_blank"
                  class="icon-button"
                  ><i class="fab fa-whatsapp"></i
                ></a>
                <a
                  href="https://wa.me/6282217777616"
                  target="_blank"
                  class="icon-button"
                  ><i class="far fa-envelope"></i
                ></a>                
                <a
                  href="https://id.linkedin.com/company/mindo-education"
                  class="icon-button"
                  target="_blank"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
                <a
                  href="https://www.facebook.com/mindoeducation"
                  class="icon-button"
                  target="_blank"
                  ><i class="fab fa-instagram"></i
                ></a>
              </div>
            
          </div>          
          <div class="footer-link col-lg-3 col-md-12 col-sm-12 mt-4">
            <h3>Program</h3>
            <ul class="font-link2">
              <li class="my-2">
                <a href="">Food Safety</a>
              </li>
              <li class="my-2">
                <a href="">QA & QC</a>
              </li>
              <li class="my-2">
                <a href="">Halal</a>
              </li>              
            </ul>
          </div>
          <div class="footer-link col-lg-3 col-md-12 col-sm-12 mt-4">
            <h3>Unggulan</h3>
            <ul class="font-link2">
              <li class="my-2">
                <a href="">Food Safety</a>
              </li>
              <li class="my-2">
                <a href="">QA & QC</a>
              </li>
              <li class="my-2">
                <a href="">Halal</a>
              </li>              
            </ul>
          </div>
          <div class="footer-link col-lg-3 col-md-12 col-sm-12 mt-4">
            <h3>Jenis Pelatihan</h3>
            <ul class="font-link2">
              <li class="my-2">
                <a href="">Offline Training</a>
              </li>
              <li class="my-2">
                <a href="">Online Training</a>
              </li>
              <li class="my-2">
                <a href="">Mindo Learning</a>
              </li>              
            </ul>
          </div>
        </div>                            
      </div>
      <div class="copyright">        
        <div class="row align-items-center h-100 w-100">
          <p class="col text-center sub-header2 mb-0">© 2022 Mindo Education. All Rights Reserved</p>        
        </div>          
      </div>        
    </footer>    
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @stack('scripts')  
</html>
