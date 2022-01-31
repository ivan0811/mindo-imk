@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12 mt-3">
              <div class="card-header">
                <h1 class="card-title">Data Pelatihan</h1>

                <div class="card-tools">
                    <div class="card-tools">
                        <form action="{{route('search_training')}}" method="GET">
                          <div class="input-group input-group-sm" style="width: 350px;">
                          <input type="text" name="q" class="form-control float-right" placeholder="Cari Pelatihan">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                            <a href="{{ route('create_training') }}" class="btn btn-info ml-3" style="border-radius:0; border:none;">Tambah Data</a>
                          </div>
                        </div>
                        </form>
                    </div>
                </div>
              </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="col-1">No</th>
                      <th class="col-2">Kategori</th>
                      <th class="col-2">Nama Pengajar</th>
                      <th class="col-2">Nama Pelatihan</th>
                      <th class="col-3">Deskripsi</th>
                      <th class="col-2">Tipe</th>
                      <th class="col-2">Harga</th>
                      <th class="col-2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($training as $item)
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{strlen($item->trainer->name) > 20 ? substr($item->trainer->name, 0, 20).'...' : $item->trainer->name}}</td>
                        <td>{{strlen($item->name) > 20 ? substr($item->name, 0, 20).'...' : $item->name}}</td>
                        <td>{{strlen($item->description) > 20 ? substr($item->description, 0, 20).'...' : $item->description}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->price}}</td>
                        <td>
                          <form action="{{route('delete_training', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                              <a href="" class="btn btn-info">Detail</a>
                              <a href="{{route('edit_training', $item->id)}}" class="btn btn-success">Ubah</a>
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </td>
                          </form>
                      </tr>
                      @php
                          $no++;
                      @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              @php
                  $currentPage = $training->currentPage();
                  $url = '/pelatihan?page=';
              @endphp
              @if ($training->lastPage() > 1)
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item {{$currentPage == 1 ? 'disabled' : ''}}"><a class="page-link" href="{{$url.$currentPage-1}}">&laquo;</a></li>
                  @for ($i = 1; $i <= $training->lastPage(); $i++)
                    <li class="page-item {{$currentPage == $i ? 'active' : ''}}"><a class="page-link" href="{{$url.$i}}">{{$i}}</a></li>
                  @endfor
                  <li class="page-item {{$currentPage == $training->lastPage() ? 'disabled' : ''}}"><a class="page-link" href="{{$url.$currentPage+1}}">&raquo;</a></li>
                </ul>
              </div>
              @endif
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
