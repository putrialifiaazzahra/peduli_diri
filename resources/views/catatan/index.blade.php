@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if ($message = session()->get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if ($message = session()->get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
    
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Catatan Perjalanan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>TANGGAL</th>
                            <th>WAKTU</th>
                            <th>LOKASI PERJALANAN</th>
                            <th>SUHU TUBUH</th>
                            <th>ACTION</th>
                        </thead>
                        <tbody>
                            @forelse ($catatan as $catatan)
                                <tr>
                                    <td>{{ $catatan->tanggal }}</td>
                                    <td>{!! $catatan->waktu !!}</td>
                                    <td>{!! $catatan->lokasi !!}</td>
                                    <td>{!! $catatan->suhu !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('catatan.destroy', $catatan->id) }}" method="POST">
                                        <a href="{{ route('catatan.edit', $catatan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                </div>
            </div>
        </div>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
@endsection