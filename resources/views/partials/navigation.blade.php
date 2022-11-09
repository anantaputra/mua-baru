    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ route('beranda') }}" class="navbar-brand d-block d-lg-none">
            <h1 class="text-primary">Elis Salon</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('beranda') }}" class="nav-item nav-link">Beranda</a>
                <a href="{{ route('beranda') }}#tentang-kami" class="nav-item nav-link">Tentang Kami</a>
                <a href="{{ route('beranda') }}#paket" class="nav-item nav-link">Paket</a>
            </div>
            <a href="{{ route('beranda') }}" class="navbar-brand bg-primary py-2 px-4 mx-3 d-none d-lg-block">
                <h1 class="text-white">Elis Salon</h1>
            </a>
            <div class="navbar-nav me-auto py-0">
                <a href="{{ route('beranda') }}#galeri" class="nav-item nav-link">Galeri</a>
                <a href="{{ route('beranda') }}#jadwal" class="nav-item nav-link">Jadwal</a>
                <a href="{{ route('beranda') }}#kontak" class="nav-item nav-link">Kontak</a>
            </div>
        </div>
        <div class="navbar-nav ms-auto py-0">
            @guest
            <a href="{{ route('login') }}" class="nav-item nav-link">Masuk</a>
            @endguest
            @auth
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                    <a href="{{ route('pesanan') }}" class="dropdown-item">Pesanan</a>
                    <form action="{{ route('logout') }}" method="post" id="form-logout">
                        @csrf
                    </form>
                    <a role="button" onclick="document.querySelector('#form-logout').submit()" class="dropdown-item">Logout</a>                
                </div>
            </div>
            @endauth
        </div>
    </nav>
    <!-- Navbar End -->