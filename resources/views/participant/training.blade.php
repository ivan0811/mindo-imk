@extends('master')
@section('content')
<main class="">            
  <!-- Syarat Article -->
  <article id="pelatihan-kategori" class="container">        
    <div class="d-flex justify-content-between">          
      <form action="{{route('program_category')}}" method="get" id="form_category" style="width: 100%">          
        <select class="dropdown-unit-select2" onchange="changeCategory()" name="nama" id="unit_category" style="width: 100%">
          @foreach ($category as $item)                
              <option value="{{$item->name}}" @if (Request::get('nama') == $item->name) selected @endif>{{$item->name}}</option>                                         
          @endforeach              
        </select>          
    </form>            
    </div>        
    <div class="row">
      @foreach ($program as $item)
      <div class="col-md-4 my-3">
        <a href="{{route('detail_training', [$item->category->slug, $item->slug])}}" class="card-training">
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
    </script>
@endpush