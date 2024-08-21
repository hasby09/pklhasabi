<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-1 shadow-sm rounded">
                <div class="card-body">
                    <hr>
                    <p>
                    <hr>{{ $siswa->nisn }}
                    <hr>{{ $siswa->nis }}
                    <hr>{!! $siswa->nama !!}
                    <hr>{{ $siswa->SiswaKelas->nama_kelas }} {{ $siswa->SiswaKelas->kompetensi_keahlian }}
                    <hr>{!! $siswa->alamat !!}
                    <hr>{{ $siswa->no_telepon }}
                    <hr>{!! $siswa->SppSiswa->nominal !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>