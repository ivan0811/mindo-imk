<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini m-0 p-0 w-50">
  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12 mt-3">
              <div class="card-header">
                <h3 class="card-title">Data Pengguna</h3>
              </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="">No</th>
                      <th class="col-2">Nama Peserta</th>
                      <th class="col-2">Nama Pengguna</th>
                      <th class="col-2">No Wa</th>
                      <th class="col-1">Email</th>
                      <th class="col-1">Hak Akses</th>
                      <th class="col-3">Pelatihan yang di ikuti</th>
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
                        @foreach ($item->participantTraining as $key => $item2)
                            {{$item2->training->name}}
                            @if ($key < count($item->participantTraining) - 1)
                                , &nbsp;
                            @endif
                        @endforeach
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
            </div>
            <!-- /.card -->
          </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
