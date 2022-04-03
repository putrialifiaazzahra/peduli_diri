@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        @if(Auth::user()->role == 'admin')
            {{-- menu navbar buat admin --}}
            <div class="col-md-5 bg-white rounded p-3 d-flex">
                <i class="bi bi-people-fill display-3 me-3"></i>
                <a href="/catatan" class="d-flex align-items-center text-dark text-decoration-none">
                    <h1>Users</h1>
                </a>
            </div>
        @else
            {{-- <div class="col-md-5 bg-white rounded p-3 d-flex">
                <i class="bi bi-people-fill display-3 me-3"></i>
                <a href="/catatan" class="d-flex align-items-center text-dark text-decoration-none">
                    <h1>Catatan</h1>
                </a>
            </div> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body p-5">
                            <h3 class="fw-bold mb-4">TAMBAH CATATAN</h3>
                            <form action="{{ route('catatan.store') }}" method="POST" enctype="multipart/form-data">
                            
                                @csrf
    
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" >
                                
                                    <!-- error message untuk tanggal -->
                                    @error('tanggal')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Waktu</label>
                                    <input type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{ old('waktu') }}" placeholder="Masukkan Waktu">
                                
                                    <!-- error message untuk waktu -->
                                    @error('waktu')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Lokasi Perjalanan</label>
                                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" placeholder="Masukkan Lokasi Perjalanan">
                                
                                    <!-- error message untuk nama siswa -->
                                    @error('lokasi')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Suhu Tubuh</label>
                                    <input type="text" class="form-control @error('suhu') is-invalid @enderror" name="suhu" value="{{ old('suhu') }}" placeholder="Masukkan Suhu Tubuh">
                                
                                    <!-- error message untuk nama siswa -->
                                    @error('suhu')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
    
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        @endif
       
    </div>
</div>
@endsection
