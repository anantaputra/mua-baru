{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.login')

@section('css')
    <style>
        body{
            overflow: hidden;
        }

        .half, .half .container > .row {
            height: 100vh;
            min-height: 700px; 
        }

        @media (max-width: 991.98px) {
            .half .bg {
                height: 200px; 
            } 
        }

        .half .contents {
            background: #f6f7fc; 
        }

        .half .contents, .half .bg {
            width: 50%; 
        }

        @media (max-width: 1199.98px) {
            .half .contents, .half .bg {
                width: 100%; 
            } 
        }

        .half .contents .form-control, .half .bg .form-control {
            border: none;
            -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            height: 54px;
            background: #fff; 
        }

        .half .contents .form-control:active, .half .contents .form-control:focus, .half .bg .form-control:active, .half .bg .form-control:focus {
            outline: none;
            -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1); 
        }

        .half .bg {
            background-size: cover;
            background-position: center; 
        }

        .half a {
            color: #888;
            text-decoration: underline; 
        } 

        .half .btn {
            height: 54px;
            padding-left: 30px;
            padding-right: 30px; 
        }

        .half .forgot-pass {
            position: relative;
            top: 2px;
            font-size: 14px; 
        }
    </style>
@endsection

@section('content')
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image:url('img/login.jpg')"></div>
    <div class="contents order-2 order-md-1" style="margin-top: -32px;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <h3>Daftar</h3>
                    <p class="mb-4">Selamat datang di Elis Salon. Daftar akun untuk dapat melakukan pemesanan.</p>
                    <form action="" method="post" class="mb-4">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" id="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="password-confirm">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password" id="password-confirm">
                        </div>
                        <button type="submit" class="btn btn-block btn-primary w-100">Daftar</button>
                    </form>
                    <p><span>Sudah punya akun?</span> <a href="{{ route('login') }}">masuk</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
