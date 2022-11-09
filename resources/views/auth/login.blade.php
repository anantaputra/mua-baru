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
    <div class="contents order-2 order-md-1" style="margin-top: -40px;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <h3>Masuk</h3>
                    <p class="mb-4">Selamat datang di Elis Salon. Masuk untuk dapat melakukan pemesanan.</p>
                    <form action="{{ route('login') }}" method="post" class="mb-4">
                        @csrf
                        <div class="form-group first mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email Anda" id="email">
                        </div>
                        <div class="form-group last mb-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password Anda" id="password">
                        </div>
                        <button type="submit" class="btn btn-block btn-primary w-100">Masuk</button>
                    </form>
                    <p><span>Belum punya akun?</span> <a href="{{ route('register') }}">daftar</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
