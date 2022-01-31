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
                <h1 class="card-title">Data Pengguna</h1>

                <div class="card-tools">
                    <div class="card-tools">
                        <form action="{{route('search_user')}}" method="GET">
                          <div class="input-group input-group-sm" style="width: 350px;">
                          <input type="text" name="q" class="form-control float-right" placeholder="Cari Pengguna">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                            <a href="{{ route('create_user') }}" class="btn btn-info ml-3" style="border-radius:0; border:none;">Tambah Data</a>
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
                      <th class="col-3">Nama Peserta</th>
                      <th class="col-3">Nama Pengguna</th>
                      <th class="col-2">No Wa</th>
                      <th class="col-3">Email</th>
                      <th class="col-3">Hak Akses</th>
                      <th class="col-3">Aksi</th>
                    </tr>
                  </thead>
                  @php
                    $no = 1;
                  @endphp
                  <tbody>
                    @foreach ($user as $item)
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->username}}</td>
                      <td>{{$item->no_wa}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->role}}</td>
                      <td>
                        <form action="{{route('delete_user', $item->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <a href="{{route('edit_user', $item->id)}}" class="btn btn-success">Ubah</a>
                          <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                        </form>
                      </td>
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
                  $currentPage = $user->currentPage();
                  $url = '/pengguna?page=';
              @endphp
              @if ($user->lastPage() > 1)
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item {{$currentPage == 1 ? 'disabled' : ''}}"><a class="page-link" href="{{$url.$currentPage-1}}">&laquo;</a></li>
                  @for ($i = 1; $i <= $user->lastPage(); $i++)
                    <li class="page-item {{$currentPage == $i ? 'active' : ''}}"><a class="page-link" href="{{$url.$i}}">{{$i}}</a></li>
                  @endfor
                  <li class="page-item {{$currentPage == $user->lastPage() ? 'disabled' : ''}}"><a class="page-link" href="{{$url.$currentPage+1}}">&raquo;</a></li>
                </ul>
              </div>
              @endif
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
