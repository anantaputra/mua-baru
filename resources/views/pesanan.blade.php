@extends('layouts.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Riwayat Pesanan</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('pesanan') }}">Riwayat</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ auth()->user()->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-xxl" id="paket">
        <div class="container py-5">
            <div class="text-start mx-auto mb-3 wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="text-primary text-uppercase">Belum dibayar</h3>
            </div>
            @foreach ($pesanan as $item)
            @if ($item->status == 'pending')                
            <div class="card col-12 border-2 border-light mb-2">
                <div class="card-body px-4">
                    <div class="row">
                        <div class="col-6">
                            <h4>{{ $item->order_id }}</h4>
                            @php
                                $detail = sizeof($item->detail);
                                $total = $detail * $item->detail[0]->paket->harga;
                            @endphp
                            <h3 class="text-primary">Rp{{ number_format($total, 0, 0, '.') }}</h3>
                            <p>
                                {{ $item->detail[0]->paket->nama_paket }}
                            </p>
                            <p>
                                @if ($detail > 1)
                                {{ Carbon\Carbon::parse($item->detail[0]->tgl)->format('d M Y')." s.d. ".Carbon\Carbon::parse($item->detail[$detail - 1]->tgl)->format('d M Y') }}
                                @else 
                                {{ Carbon\Carbon::parse($item->detail[0]->tgl)->format('d M Y') }}
                                @endif
                            </p>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end">
                            @if ($item->transaksi)
                            <a onclick="window.open('{{ $item->transaksi->pdf_url }}')" role="button" class="btn btn-primary py-2" style="width: 150px;"><i class="bi bi-arrow-down-circle"></i> Download</a>
                            @else
                            <a href="{{ route('bayar', ['id' => $item->id]) }}" class="btn btn-primary py-2" style="width: 150px;"><i class="bi bi-cash-stack"></i> Bayar</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            <div class="text-start mx-auto mb-3 mt-5 wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="text-primary text-uppercase">Sudah dibayar</h3>
            </div>
            @foreach ($pesanan as $item)
            @if ($item->status == 'settlement')                
            <div class="card col-12 border-2 border-light mb-2">
                <div class="card-body px-4">
                    <div class="row">
                        <div class="col-6">
                            <h4>{{ $item->order_id }}</h4>
                            @php
                                $detail = sizeof($item->detail);
                                $total = $detail * $item->detail[0]->paket->harga;
                            @endphp
                            <h3 class="text-primary">Rp{{ number_format($total, 0, 0, '.') }}</h3>
                            <p>
                                {{ $item->detail[0]->paket->nama_paket }}
                            </p>
                            <p>
                                @if ($detail > 1)
                                {{ Carbon\Carbon::parse($item->detail[0]->tgl)->format('d M Y')." s.d. ".Carbon\Carbon::parse($item->detail[$detail - 1]->tgl)->format('d M Y') }}
                                @else 
                                {{ Carbon\Carbon::parse($item->detail[0]->tgl)->format('d M Y') }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

@endsection
