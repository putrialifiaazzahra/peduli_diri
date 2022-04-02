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
    <div class="row justify-content-center">
        @if(Auth::user()->role == 'admin')
            <div class="col-md-5 bg-white rounded p-3 d-flex">
                <i class="bi bi-people-fill display-3 me-3"></i>
                <a href="/catatan" class="d-flex align-items-center text-dark text-decoration-none">
                    <h1>Users</h1>
                </a>
            </div>
        @else
            <div class="col-md-5 bg-white rounded me-3 p-3 d-flex">
                <i class="bi bi-journal-text display-3 me-3"></i>
                <a href="/catatan" class="d-flex align-items-center text-dark text-decoration-none">
                    <h1>Catatan</h1>
                </a>
            </div>
            <div class="col-md-5 bg-white rounded me-3 p-3 d-flex">
                <i class="bi bi-journal-text display-3 me-3"></i>
                <a href="/catatan/create" class="d-flex align-items-center text-dark text-decoration-none">
                    <h1>Buat Catatan</h1>
                </a>
            </div>
        @endif
       
    </div>
</div>
@endsection
