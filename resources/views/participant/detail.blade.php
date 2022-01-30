@extends('master')
@section('content')
<!-- Main Content -->
<main class="container">            
  <!-- Syarat Article -->
      <article id="pelatihan-kategori">
        <div class="text-center">
          <h2>{{$training->category->name}}</h2>
          <p class="sub-header2">
            {{$training->name}}
          </p>
      </div>      
      <div class="row">
        <div class="col-7">
          <img src="{{asset('storage/covers/'.$training->cover)}}" class="card-img-top">   
        </div>        
        <div class="col-5">
          <h4 class="bold">Harga :</h4>
          <h3>Rp @convert($training->price)</h3>
          <h4>Deskripsi :</h4>
          <p class="sub-header2">
            {{$training->description}}
          </p>
          <h4 class="bold">Trainer :</h4>
          <p class="sub-header2">
            {{$training->trainer->name}}
          </p>
          <h4 class="bold">Tipe :</h4>
          <p class="sub-header2">
            @if ($training->type == 'regular')
              Regular (Pelatihan ini dilaksanakan) maksimal (1-2 jam)
            @else
              Integrated (Pelatihan ini dilaksanakan) maksimal (1-5 jam)
            @endif            
          </p>
          @guest                         
            <button class="btn btn-custom font-button" disabled>Checkout Via Whatsapp</button>
          @else          
            <a href="https://api.whatsapp.com/send?phone={{$no_wa}}&text={{\Auth::user()->username}}|{{$training->category->name}},{{$training->name}}" class="btn btn-custom font-button" target="_blank">Checkout Via Whatsapp</a>         
          @endguest          
        </div>
      </div>
    </article>
  </main>    
  <!-- Footer -->
  @endsection