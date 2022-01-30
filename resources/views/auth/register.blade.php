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
    <style>
        html, body{
            height: 100vh;            
        }
    </style>
  </head>
  <body>
    <main class="position-relative h-100 w-100">         
        <div class="position-absolute top-50 start-50 translate-middle" style="width: 30%;">
            <div class="text-center">
                <a href="">
                    <img src="{{asset('asset/image/logomindo.png')}}" alt="logo-mindo" />                        
                </a>         
                <h3>Mulai Bergabung!</h3>
                <p class="sub-header2">Temukan kemudahan dengan bergabung bersama kami</p>
            </div>            
            <form action="{{ route('register')}}" method="POST">
                @csrf                
                <div class="mb-3">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{old('name')}}" id="name" name="name">
                  @error('name')
                        <span id="name" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                
                <div class="mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Nama Pengguna" value="{{old('username')}}" id="username" name="username">
                    @error('username')
                        <span id="username" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                
                <div class="mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email" id="email" value="{{old('email')}}" name="email">
                    @error('email')
                        <span id="email" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                
                <div class="mb-3">
                    <input type="number" class="form-control @error('no_wa') is-invalid @enderror" placeholder="Nomor Whatsapp" id="no_wa" value="{{old('no_wa')}}" name="no_wa">
                    @error('no_wa')
                        <span id="no_wa" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                
                <div class="mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password (min 8 karakter)" id="password" name="password">
                    @error('password')
                        <span id="password" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                
                <div class="mb-3">
                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password" name="password_confirmation" id="password_confirmation">
                  @error('password_confirmation')
                        <span id="password_confirmation" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-custom">Daftar</button>
                </div>                                
            </form>
        </div>                    
    </main>
       
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    
</html>
