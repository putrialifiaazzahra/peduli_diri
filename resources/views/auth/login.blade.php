@extends('layouts.auth')

@section('content')
<div class="container pt-4">
    <div class="row my-5 justify-content-center align-items-center">
        <div class="col-5">
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
                    <form method="POST" action="{{ route('login') }}">
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
                        <div class="d-flex">
                            <a class="btn btn-secondary" href="{{ route('register') }}">
                                Belum punya akun?
                            </a>

                            <button type="submit" class="btn btn-primary ms-auto">
                                {{ __('Masuk') }}
                            </button>
                        </div>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
{{-- <div class="row mb-3">
    <div class="col-md-6 offset-md-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked'
                : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
    </div>
</div> --}}

{{-- @if (Route::has('password.request'))
<a class="btn btn-link" href="{{ route('password.request') }}">
    {{ __('Forgot Your Password?') }}
</a>
@endif --}}
@endsection