@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row">
        @if(Auth::user()->role == 'admin')
            {{-- menu navbar buat admin --}}
            <div class="col-md-5 bg-white rounded p-3 d-flex">
                <i class="bi bi-people-fill display-3 me-3"></i>
                <a href="/user" class="d-flex align-items-center text-dark text-decoration-none">
                    <h1>Users</h1>
                </a>
            </div>
        @else
            {{-- <div class="row justify-content-center">
                <div class="card border-0 shadow rounded m-4" style="width: 25rem; height: 20rem;">
                    <div class="card-body text-center" style="padding-top: 5rem;">
                        <i class="bi bi-journal-plus display-4"></i>
                        <a href="/catatan/create" class="text-dark text-decoration-none">
                            <h2>Tambah Catatan</h2>
                            <h6>Buat Daftar Catatan Perjalanan Anda</h6>
                        </a>
                    </div>
                </div>
                <div class="card border-0 shadow rounded m-4" style="width: 25rem; height: 20rem;">
                    <div class="card-body text-center" style="padding-top: 5rem;">
                        <i class="bi bi-journal-text display-4"></i>
                        <a href="/catatan" class="text-dark text-decoration-none">
                            <h2>Catatan Perjalanan</h2>
                            <h6>Lihat Daftar Catatan Perjalanan Anda</h6>
                        </a>
                    </div>
                </div>
            </div> --}}
            <div class="row mt-3">
                <div class="col-md-6">
                    <h3>
                        Riwayat Perjalanan
                    </h3>
                    <ul>
                        @forelse ($catatan as $catatan)
                            <li>{{ $catatan->tanggal }} - {!! $catatan->lokasi !!} - {!! $catatan->suhu !!} </li>
                    @empty
                        <div class="alert alert-danger">
                            <li class="text-danger">CATATAN PERJALANAN BELUM TERSEDIA</li>
                        </div>
                    @endforelse
                    </ul>
                </div>
                <div class="col-md-6">
                        <div class="card border-0 shadow rounded mb-4">
                            <div class="card-body text-center">
                                <i class="bi bi-journal-plus display-4"></i>
                                <a href="/catatan/create" class="text-dark text-decoration-none">
                                    <h2>Tambah Catatan</h2>
                                    <h6>Buat Daftar Catatan Perjalanan Anda</h6>
                                </a>
                            </div>
                        </div>
                        <div class="card border-0 shadow rounded">
                            <div class="card-body text-center">
                                <i class="bi bi-journal-text display-4"></i>
                                <a href="/catatan" class="text-dark text-decoration-none">
                                    <h2>Catatan Perjalanan</h2>
                                    <h6>Lihat Daftar Catatan Perjalanan Anda</h6>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        @endif 
    </div>
</div>
@endsection
