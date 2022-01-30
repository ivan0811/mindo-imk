@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Data Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Pengguna</li>
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
                <h3 class="card-title">Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('update_user', $user->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Peserta</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukan Nama Lengkap" value="{{$user->name}}" name="name">
                    @error('name')
                        <span id="name" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan Nama Pengguna" value="{{$user->username}}" name="username">
                    @error('username')
                      <span id="username" class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{$user->email}}">
                    @error('email')
                      <span id="email" class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" name="password">
                    @error('password')
                      <span id="password" class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password_confirm">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirm" placeholder="Masukkan Konfirmasi Password" name="password_confirmation">
                    @error('password_confirmation')
                      <span id="password_confirm" class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Pilih Hak Akses</label>
                    <select class="form-control" id="role" name="role">                      
                      <option value="peserta" @if ($user->role == 'peserta') selected @endif>Peserta</option>        
                      <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                    </select>
                  </div>
                  <div id="peserta_wa" class="form-group">
                    <label for="no_wa">No Whatsapp</label>
                    <input type="number" class="form-control @error('no_wa') is-invalid @enderror" id="no_wa" placeholder="Masukkan Nomor Whatsapp" value="{{$user->no_wa}}" name="no_wa">
                    @error('no_wa')
                      <span id="no_wa" class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  @php
                      $training_id = [];                      
                      if($user->role == 'peserta'){
                        $training_id = $user->participantTraining;
                      }
                  @endphp
                  @if (count($training_id) > 0)
                      @foreach ($training_id as $item)
                        <input type="hidden" name="old_training_id[]" value="{{$item->id}}">
                      @endforeach                      
                  @endif
                  <div id="peserta_pelatihan" class="form-group">
                    <label for="training_id">Riwayat Mengikuti Pelatihan</label>
                    <select class="select2 @error('training_id') is-invalid @enderror" multiple="multiple" id="training_id" data-placeholder="Pilih Pelatihan" style="width: 100%;" name="training_id[]">
                      @foreach ($training as $key => $item)      
                          @php
                              $skip = false;
                          @endphp                                          
                          @foreach ($training_id as $item1)
                            @if ($item1->training_id == $item->id)
                              <option value="{{$item->id}}" selected>{{$item->name}}</option>
                              @php
                                  $skip = true;
                              @endphp
                            @endif                            
                          @endforeach                                   
                          @if (!$skip)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                          @endif                                                                                             
                      @endforeach
                    </select>
                    @error('training_id')
                      <span id="training_id" class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror                    
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="/pengguna" class="btn btn-default">Kembali</a>
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
  $('.select2').select2({
    theme: 'bootstrap4'
  })

//Initialize Select2 Elements
  // $('.select2bs4').select2({
  //   theme: 'bootstrap5'
  // })

  if($(e.target).val() == 'admin'){
    $('#peserta_wa').hide()
    $('#peserta_pelatihan').hide()
  }

  $('#role').change((e) => {  
    if($(e.target).val() == 'admin'){      
      $('#peserta_pelatihan').hide()
    }

    if($(e.target).val() == 'peserta'){      
      $('#peserta_pelatihan').show()
    }
  })
</script>
@endpush