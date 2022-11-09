@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css" integrity="sha256-jLWPhwkAHq1rpueZOKALBno3eKP3m4IMB131kGhAlRQ=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js" integrity="sha256-h/8r72lsgOmbQuoZKT6x3MwmqPIBN9rgiD23Bzgd2n4=" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: 'jadwal/event',
      });
      calendar.render();
    });
</script>
@endsection

@section('content')

    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <p class="text-primary text-uppercase mb-2 animated slideInDown">Selamat Datang di Elis Salon</p>
                    <h1 class="display-4 mb-3 animated slideInDown">Salon penyedia jasa make up pengantin di Klaten</h1>
                    <p class="animated slideInDown">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100 mb-3" src="img/hero-1.jpg" alt="">
                            <img class="img-fluid bg-white p-3 w-50" src="img/hero-3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-50 mb-3" src="img/hero-4.jpg" alt="">
                            <img class="img-fluid bg-white p-3 w-100" src="img/hero-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5" id="tentang-kami">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3 img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid bg-light p-3" src="img/about-1.jpg" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid bg-light p-3" src="img/about-2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">Tentang Kami</p>
                        <h1 class="display-6 mb-4">Kami Penyedia Jasa Make Up Pengantin di Klaten</h1>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Quality Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Custom Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Online Order
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Home Delivery
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl bg-light py-5 my-5" id="paket">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Paket</p>
                <h1 class="display-6 mb-4">Paket yang kami sediakan</h1>
            </div>
            @if (isset($paket))
            <div class="row g-3">
                @php
                    $durasi = ['0.1s', '0.3s', '0.5s', '0.7s'];
                    $cla = ['', 'pt-lg-5', '', 'pt-lg-5'];
                    $no = 0;
                @endphp
                @foreach ($paket as $item)
                <div class="col-lg-3 col-md-6 {{ $cla[$no] }} wow fadeInUp" data-wow-delay="{{ $durasi[$no] }}">
                    <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('paket/'.$item->gambar) }}" alt="">
                            <div class="service-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href="{{ route('detail', ['id' => $item->id]) }}"><i class="fa fa-eye text-primary"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h4>{{ $item->nama_paket }}</h4>
                            <span>Rp{{ number_format($item->harga, 0, 0, '.') }}</span>
                        </div>
                    </div>
                </div>
                @php
                    $no++;
                @endphp
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <!-- Service End -->


    <!-- Project Start -->
    <div class="container-xxl py-5" id="galeri">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Galeri</p>
                <h1 class="display-6 mb-0">Galeri Hasil Pekerjaan Kami</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="img/project-5.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="img/project-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="img/project-2.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="img/project-6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="img/project-7.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="img/project-3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="img/project-4.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="img/project-8.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5" id="jadwal">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Jadwal</p>
                <h1 class="display-6 mb-0">Lihat Tanggal Yang Tersedia Untuk Acara Anda</h1>
            </div>
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

@endsection

@section('js')
@endsection