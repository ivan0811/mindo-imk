<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border=1>
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
</body>
</html>
