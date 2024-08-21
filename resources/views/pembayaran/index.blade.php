<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Data pembayaran</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('pembayaran.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA PEMBAYARAN</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">nisn</th>
                            <th scope="col">tanggal_bayar</th>
                            <th scope="col">bln_bayar</th>
                            <th scope="col">tahun_bayar </th>
                            <th scope="col">nominal</th>
                            <th scope="col">jumlah_bayar</th>
                            <th scope="col">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($pembayaran as $d)
                            <tr>
                                <td>{{ $d->nisn }}</td>
                                <td>{{ $d->tgl_bayar }}</td>
                                <td>{!! $d->bln_bayar!!}</td>
                                 {{-- @dd($d->PembayaranSpp->tahun) --}}
                                <td>{{ $d->PembayaranSpp->tahun??null }}</td>
                                <td>{!! $d->PembayaranSpp?->nominal !!}</td>
                                <td>{{ $d->jumlah_bayar }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pembayaran.destroy', $d->id_pembayaran) }}" method="POST">
                                        <a href="{{ route('pembayaran.show', $d->id_pembayaran) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('pembayaran.edit',$d->id_pembayaran) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data siswa belum Tersedia.
                            </div>
                        @endforelse
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if(session()->has('success'))

    toastr.success('{{ session('success') }}', 'BERHASIL!');

    @elseif(session()->has('error'))

    toastr.error('{{ session('error') }}', 'GAGAL!');

    @endif
</script>

</body>
</html>