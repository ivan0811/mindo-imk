@extends('master')
@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  {{-- <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div> --}}
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('asset/image/cover2.png')}}" class="d-block w-100" />
          <div id="cover1-caption" class="row align-items-center">
              <h1>Upgrade Skill Industri Terkini Belajar Langsung dari Praktisi</h1>
              <p class="sub-header">Platform edukasi untuk meningkatkan skill dan pengetahuanmu #JadiLebihTau</p>
              <form action="{{route('search_program')}}" method="GET" id="search_program">
                <div class="d-flex custom-input-search">
                  <span class="fa fa-search"></span>
                  <input type="search" placeholder="Cari pelatihan disini" name="q" id="search_keyword">
                </div>
              </form>
          </div>
    </div>
  </div>
</div>

<main class="">
  <!-- Program Article -->
  <article id="pelatihan-terbaru" class="text-center container">
    <h2>Pelatihan Terbaru</h2>
    <p class="sub-header2 mb-5">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed massa metus.
    </p>
    <div class="row">
      @foreach ($program_terbaru as $item)
        <div class="col-md-4">
          <a href="" class="card-training">
            <div class="card border-0 rounded text-start">
              <div class="card-body">
                  <img src="{{asset('storage/covers/'.$item->cover)}}" height="250px" class="card-img-top">
                  <p class="caption">{{$item->type}}</p>
                  <h4>
                      {{$item->name}}
                  </h4>
                  <h3>
                      Rp @convert($item->price)
                  </h3>
                  <p class="caption">{{$item->trainer->name}}</p>
              </div>
          </div>
          </a>
        </div>
      @endforeach
    </div>
    <div class="button-bottom">
      <a href="" class="btn btn-custom font-button">Lihat Semua Pelatihan <span class="fa fa-arrow-right"></span></a>
    </div>

  </article>
  <!-- Syarat Article -->
  <article id="pelatihan-unggulan" class="container">
    <h2>Pelatihan Unggulan</h2>
    <div class="d-flex justify-content-between">
        <p class="sub-header2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed massa metus.</p>
        <form action="{{route('index_category')}}" method="get" id="form_category" style="width: 30%">
            <select class="dropdown-unit-select2" onchange="changeCategory()" name="nama" id="unit_category" style="width: 100%">
              @foreach ($category as $item)
                  <option value="{{$item->name}}" @if (Request::get('nama') == $item->name) selected @endif>{{$item->name}}</option>
              @endforeach
            </select>
        </form>
    </div>
    <div class="row">
      @foreach ($program_unggulan as $item)
      <div class="col-md-4 my-3">
        <a href="" class="card-training">
          <div class="card border-0 rounded text-start">
              <div class="card-body">
                  <img src="{{asset('storage/covers/'.$item->cover)}}"  height="250px" class="card-img-top">
                  <p class="caption">{{$item->type}}</p>
                  <h4>
                    {{$item->name}}
                  </h4>
                  <h3>
                    Rp @convert($item->price)
                  </h3>
                  <p class="caption">{{$item->trainer->name}}</p>
              </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </article>

  <article id="about-mindo">
      <div class="text-center">
        <h2>Apa itu Mindo Education?</h2>
        <p class="sub-header2 mb-5">Suatu platform penyedia pelatihan untuk Mahasiswa, Freshgraduate, dan lain lain untuk meningkatkan skill dan pengetahuanmu. #JadiLebihTahu</p>
        <div class="d-flex">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 my-3">
              <img src="{{asset('asset/image/pelatihan1.png')}}" alt="">
            </div>
            <div class="col-md-4 my-3">
              <img src="{{asset('asset/image/pelatihan2.png')}}" alt="">
            </div>
            <div class="col-md-4 my-3">
              <img src="{{asset('asset/image/pelatihan3.png')}}" alt="">
            </div>
            <div class="col-md-8 my-3">
              <img src="{{asset('asset/image/pelatihan4.png')}}" alt="">
            </div>
          </div>
        </div>
        <div class="button-bottom">
          <a href="" class="btn btn-custom font-button">Mulai Investasi Ilmu <span class="fa fa-arrow-right"></span></a>
        </div>
      </div>
  </article>
  <!-- Form Article -->

</main>
@endsection
@push('scripts')
    <script>
      $(".dropdown-unit-select2").select2({
            width: 'resolve' // need to override the changed default
        });

        function changeCategory(){
          $('#form_category').submit()
        }

        $('#search_keyword').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
          {
            $('#search_program').submit()
          }
        });
    </script>
@endpush
