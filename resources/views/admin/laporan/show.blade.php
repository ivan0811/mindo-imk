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
            <h1 class="text-center mb-3" style="margin-top:30vh;">Laporan Pengguna</h1>
            <div class="text-center">
                <a href="{{ URL::to('/laporan/pdf') }}" class="btn btn-primary" style="width:300px;">Unduh Laporan</a>
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
