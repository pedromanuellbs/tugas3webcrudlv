<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>CRUD LARAVEL 8 / TUGAS</title>

    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin-bottom: 60px;
            background-color: #00000058; /* Warna ungu */
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            /* background-color: #00000058; Warna ungu */
        }

        .center-table {
            margin: 0 auto;
            float: none;
        }

        td {
            text-align: center;
            vertical-align: middle;
        }

        th {
            text-align: center;
            vertical-align: middle;
        }

        tr {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <br>
    <h1 class="text-center mb-4">DATA PEGAWAI</h1>

    <div class="container">
        <a href="/tambahpegawai" class="btn btn-success mb-4">TAMBAH +</a>

        <div class="row">
            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-dark" role="alert">
                    {{ $message }}
                </div>
            @endif --}}
            <table class="table table-sm table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no =1;
                    @endphp
                    @foreach ($data as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->nama }}</td>
                        <td> 
                            <img src="{{ asset('fotopegawai/' .$row->foto) }}" alt="" style="width: 100px;">
                        </td>
                        <td>{{ $row->jeniskelamin }}</td>
                        <td>0{{ $row->notelpon }}</td>
                        <td>{{ $row->created_at->format('D M Y')}}</td>
                        <td>
                            <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}" >Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  
                  
                </tbody>
              </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.delete').click(function(){
            var pegawaiid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            swal({
                title: "Kamu Yakin?",
                text: "Kamu akan menghapus data pegawai dengan nama "+nama+" ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete/"+pegawaiid+"";
                    swal("Nooo, Datanya berhasil di hapus :( ", {
                        icon: "success",
                    });
                } else {
                    swal("Datanya tidak jadi dihapus, yey!");
                }
            });
        });
    </script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif 
    </script>

    <footer class="footer mt-auto py-3" >
        <div class="container text-center">
            <span class="text-white">Remade by Love from Pedro Manuel LBS 202104560020</span>
        </div>
    </footer>
</body>
</html>
