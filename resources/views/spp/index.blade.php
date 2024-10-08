<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data spp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">DATA SPP</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('spp.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">tahun</th>
                            <th scope="col">nominal</th>
                            <th scope="col">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($spp as $d)
                            <tr>
                                <td>{{ $d->tahun }}</td>
                                <td>{!! $d->nominal !!}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('spp.destroy', $d->id_spp) }}" method="POST">
                                        <a href="{{ route('spp.show', $d->id_spp) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('spp.edit',$d->id_spp) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Post belum Tersedia.
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
