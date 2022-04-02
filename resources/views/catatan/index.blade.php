<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA CATATAN PERJALANAN | PEDULI DIRI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('home') }}" class="btn btn-md btn-danger mb-3">Kembali</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">WAKTU</th>
                                <th scope="col">LOKASI PERJALANAN</th>
                                <th scope="col">SUHU TUBUH</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($catatans as $catatan)
                                <tr>
                                    <td>{{ $catatan->tanggal }}</td>
                                    <td>{!! $catatan->waktu !!}</td>
                                    <td>{!! $catatan->lokasi !!}</td>
                                    <td>{!! $catatan->suhu !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ ('catatan.destroy') }}" method="POST">
                                            <a href="{{ ('catatan.edit') }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      CATATAN PERJALANAN BELUM TERSEDIA.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $catatans->links() }}
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