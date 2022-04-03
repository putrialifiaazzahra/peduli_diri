@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row my-3 justify-content-center align-items-center">
        <div class="col-7">
            @if(session()->has('gagal'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('gagal') }}
            </div>
            @endif
            <div class="card p-4 border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">PEDULI DIRI</h2>
                        <p>CATATAN PERJALANAN</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" id="nik" class="form-control @error('nik') is-invalid @enderror"
                                name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>
                            @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" required autocomplete="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="d-flex">
                            <a class="btn btn-secondary" href="{{ route('login') }}">
                                Sudah punya akun?
                            </a>

                            <button type="submit" class="btn btn-primary ms-auto">
                                {{ __('Register') }}
                            </button>
                        </div>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
@endsection
