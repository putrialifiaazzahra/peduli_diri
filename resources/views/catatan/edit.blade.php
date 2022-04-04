@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Catatan Perjalanan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('catatan.update', $catatan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal', $catatan->tanggal) }}" placeholder="Masukkan Tanggal">
                    
                        <!-- error message untuk edit tanggal -->
                        @error('tanggal')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Waktu</label>
                        <input type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{ old('waktu', $catatan->waktu) }}" placeholder="Masukkan waktu">
                    
                        <!-- error message untuk edit waktu -->
                        @error('waktu')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi', $catatan->lokasi) }}" placeholder="Masukkan Lokasi">
                    
                        <!-- error message untuk edit lokasi -->
                        @error('lokasi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Suhu Tubuh</label>
                        <input type="text" class="form-control @error('suhu') is-invalid @enderror" name="suhu" value="{{ old('suhu', $catatan->suhu) }}" placeholder="Masukkan Suhu Tubuh">
                    
                        <!-- error message untuk edit suhu tubuh-->
                        @error('suhu')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
@endsection