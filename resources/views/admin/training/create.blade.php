@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Pelatihan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Pelatihan</li>
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
                <h3 class="card-title">Pelatihan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="row col-12">
                    <div class="card-body col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Cover</label>
                        <div>
                            <img src="" alt="" id="preview_cover" style="width: 100%; height: 260px; background-color: gray;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Upload Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kategori</label>
                        <select class="custom-select form-control-border" id="exampleSelectBorder">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pelatihan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                      </div>
                    </div>
                    <div class="card-body col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pengajar</label>
                        <select class="custom-select form-control-border" id="exampleSelectBorder">
                            @foreach ($trainer as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tipe</label>
                        <div class="row">
                            <div class="col-sm-2">
                              <!-- checkbox -->
                              <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1">
                                    <label class="form-check-label">Reguler</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <!-- radio -->
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="radio1">
                                  <label class="form-check-label">Integrated</label>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <!-- textarea -->
                        <textarea class="form-control" rows="10"></textarea>
                      </div>
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
@push('scripts')
    <script>

        $('#image_cover').change((e) => {
            $('#preview_cover').attr('src', URL.createObjectURL($(e)[0].target.files[0]));
        })

    </script>
@endpush
