@extends('layouts.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Detail Paket</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('beranda') }}#paket">Paket</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $paket->nama_paket }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('paket/'.$paket->gambar) }}" alt="" class="w-50">
            </div>
            <div class="col-lg-6 p-3">
                <h1>{{ $paket->nama_paket }}</h1>
                <h3 class="text-primary">Rp{{ number_format($paket->harga, 0, 0, '.') }}</h3>
                <div>
                    <p>
                        {!! $paket->deskripsi !!}
                    </p>
                </div>
                <div class="mt-5">
                    <a href="{{ route('pesan', ['id' => $paket->id]) }}" class="btn btn-primary p-2">
                        <i class="bi bi-arrow-right-circle-fill"></i> Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
