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
              <form action="{{route('store_training')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row col-12">
                    <div class="card-body col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Cover</label>
                        <div>
                            <img src="" alt="" id="preview_cover" style="width: 100%; height: 260px; background-color: gray;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="image_cover">Upload Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image_cover" name="cover" value="">
                                <label class="custom-file-label" for="image_cover">Pilih File</label>                                
                                @error('cover')
                                    <span id="image_cover" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                                                        
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control" id="category" name="category_id">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}" {{old('category_id') == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                            @endforeach
                        </select>                        
                      </div>
                      <div class="form-group">
                        <label for="training_name">Nama Pelatihan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="training_name" placeholder="Masukkan nama pelatihan" value="{{old('name')}}" name="name">
                        @error('name')
                            <span id="training_name" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="card-body col-6">
                      <div class="form-group">
                        <label for="trainer_name">Nama Pengajar</label>
                        <select class="form-control" id="trainer_name" name="trainer_id">
                            @foreach ($trainer as $item)                                
                                <option value="{{ $item->id }}" {{old('trainer_id') == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
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
                                    <input class="form-check-input" type="radio" id="reguler" value="regular" name="type" {{old('type') == 'regular' || old('type') == null ? 'checked' : ''}}>
                                    <label class="form-check-label" for="reguler">Reguler</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <!-- radio -->
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" id="integrated" value="integrated" type="radio" name="type" {{old('type') == 'integrated' ? 'checked' : ''}}>
                                  <label class="form-check-label" for="integrated">Integrated</label>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Masukkan Jumlah Harga" value="{{old('price')}}" name="price">
                        @error('price')
                            <span id="price" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="description">Deskripsi</label>                        
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan Deskripsi" rows="10"  name="description">{{old('training')}}</textarea>
                        @error('description')
                            <span id="description" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="/pelatihan" class="btn btn-default">Kembail</a>
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
