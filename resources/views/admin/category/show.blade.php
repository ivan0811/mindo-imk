@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Kategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12 mt-3">
              <div class="card-header">
                <h1 class="card-title">Kategori</h1>

                <div class="card-tools">                                    
                    <form action="{{route('search_category')}}" method="GET">
                      <div class="input-group input-group-sm" style="width: 350px;">                      
                      <input type="text" name="q" class="form-control float-right" placeholder="Cari Kategori">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>               
                        <a href="{{ route('create_category') }}" class="btn btn-info ml-3" style="border-radius:0; border:none;">Tambah Data</a>       
                      </div>      
                    </div>                  
                    </form>                                                                        
                </div>
              </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="col-1">No</th>
                      <th class="col-8">Nama</th>
                      <th class="col-3">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                    @foreach ($category as $item)
                      <tr>                      
                        <td>{{$no}}</td>
                        <td>{{$item->name}}</td>
                        <td>                          
                          <a href="{{route('edit_category', $item->id)}}" class="btn btn-success">Ubah</a>                          
                          <button class="btn btn-danger" onclick="delete_modal({{$item->id}}, '{{$item->name}}')">Hapus</button>
                          <form action="{{route('delete_category', $item->id)}}" method="post" id="delete_{{$item->id}}">
                            @csrf
                            @method('DELETE')                                                     
                          </form>                          
                        @php
                            $no++;
                        @endphp
                      </tr>
                    @endforeach                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              @php
                  $currentPage = $category->currentPage(); 
                  $url = '/kategori?page=';
              @endphp  
              @if ($category->lastPage() > 1)
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">                                    
                  <li class="page-item {{$currentPage == 1 ? 'disabled' : ''}}"><a class="page-link" href="{{$url.$currentPage-1}}">&laquo;</a></li>
                  @for ($i = 1; $i <= $category->lastPage(); $i++)                                                      
                    <li class="page-item {{$currentPage == $i ? 'active' : ''}}"><a class="page-link" href="{{$url.$i}}">{{$i}}</a></li>                  
                  @endfor                  
                  <li class="page-item {{$currentPage == $category->lastPage() ? 'disabled' : ''}}"><a class="page-link" href="{{$url.$currentPage+1}}">&raquo;</a></li>
                </ul>
              </div>
              @endif              
            </div>
            <!-- /.card -->
          </div>
        </div>

        <div class="modal fade" id="modal_delete">
          <div class="modal-dialog">
            <div class="modal-content bg-danger">
              <div class="modal-header">
                <h4 class="modal-title" id="modal_title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p id="modal_message">Yakin Akan Menghapus</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light" onclick="delete_action()">Hapus</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


@endsection
@push('scripts')
  <script>
    var id_category = 0
    function delete_modal(id, name) {
      id_category = id
      $('#modal_title').text('Hapus Kategori')
      $('#modal_message').text('Yakin Akan Menghapus '+name+' ?')
      $('#modal_delete').modal('show')
    }

    function delete_action(){      
      $('#delete_'+id_category).submit()
    }
      
  </script>  
@endpush