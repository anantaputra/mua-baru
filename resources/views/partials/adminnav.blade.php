<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar_blog_2">
        <h4 style="background-color: #EAA636">Elis Salon</h4>
        <ul class="list-unstyled components" style="background-color: #d1b27f; height: 100vh;">
            <li style="{{ Request::is('admin') ? 'background-color: #e9be7a' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span>
                </a>
            </li>
            <li style="{{ Request::is('admin/paket') ? 'background-color: #e9be7a' : '' }}">
                <a href="{{ route('admin.paket') }}">
                    <i class="fa fa-list orange_color"></i> <span>Paket</span>
                </a>
            </li>
            <li style="{{ Request::is('admin/pesanan') ? 'background-color: #e9be7a' : '' }}">
                <a href="{{ route('admin.pesanan') }}" class="d-flex justify-content-between">
                    <div>
                        <i class="fa fa-table purple_color"></i> <span>Pesanan</span>
                    </div>
                    <div>
                        @php
                            $jml = App\Models\Pesanan::where('status', 'settlement')
                                        ->with(['detail' => function($q){
                                            $q->whereDate('tgl', '>=', Carbon\Carbon::today())->get();
                                        }])
                                        ->get()->count();
                        @endphp
                        <span class="badge text-bg-success" style="background-color: RGBA(13,110,253,var(--bs-bg-opacity,1))!important">{{ $jml }}</span>
                    </div>
                </a>
            </li>
            <li style="{{ Request::is('admin/laporan') ? 'background-color: #e9be7a' : '' }}">
                <a href="{{ route('admin.laporan') }}">
                    <i class="fa fa-file purple_color2"></i> <span>Laporan</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- end sidebar -->