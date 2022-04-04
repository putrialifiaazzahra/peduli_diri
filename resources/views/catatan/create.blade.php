@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buat Catatan Perjalanan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('catatan.store') }}" method="POST" enctype="multipart/form-data">
                
                    @csrf

                    <div class="form-group mb-2">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" >
                    
                        <!-- error message untuk tanggal -->
                        @error('tanggal')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label class="font-weight-bold">Waktu</label>
                        <input type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{ old('waktu') }}" placeholder="Masukkan Waktu">
                    
                        <!-- error message untuk waktu -->
                        @error('waktu')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label class="font-weight-bold">Lokasi Perjalanan</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" placeholder="Masukkan Lokasi Perjalanan">
                    
                        <!-- error message untuk nama siswa -->
                        @error('lokasi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label class="font-weight-bold">Suhu Tubuh</label>
                        <input type="text" class="form-control @error('suhu') is-invalid @enderror" name="suhu" value="{{ old('suhu') }}" placeholder="Masukkan Suhu Tubuh">
                    
                        <!-- error message untuk nama siswa -->
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