@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Pengajar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Pengajar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pengajar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('store_trainer')}}" method="POST">
                @csrf                
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Pengajar</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{old('name')}}" name="name">
                    @error('name')
                        <span id="name" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="" value="{{old('email')}}" name="email">
                    @error('email')
                        <span id="email" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="no_wa">No Whatsapp</label>
                    <input type="number" class="form-control @error('name') is-invalid @enderror" id="no_wa" placeholder="" value="{{old('no_wa')}}" name="no_wa">
                    @error('no_wa')
                        <span id="no_wa" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
    </div>
</section>
@endsection
