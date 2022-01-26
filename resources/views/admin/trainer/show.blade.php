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
                <h1 class="card-title">Data Pengajar</h1>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 350px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Cari Pengajar">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                      <a href="{{ route('create_trainer') }}" class="btn btn-info ml-3" style="border-radius:0; border:none;">Tambah Data</a>
                    </div>
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
                      <th class="col-3">Nama Pengajar</th>
                      <th class="col-2">No Wa</th>
                      <th class="col-3">Email</th>
                      <th class="col-3">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Hayin Faathirza</td>
                      <td>08123123123</td>
                      <td>TomiGantenx@gmail.com</td>
                      <td><a href="#" class="btn btn-success">Ubah</a><a href="#" class="btn btn-danger ml-2">Hapus</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
