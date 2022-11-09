@extends('layouts.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Pesan Paket</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('beranda') }}#paket">Paket</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('detail', ['id' => $paket->id]) }}">{{ $paket->nama_paket }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pesan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <div class="container-fluid py-5 d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light rounded-0 shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h3 class="card-title">Masukkan Pesanan</h3>
                    </div>
                    <form action="{{ route('pesan.simpan') }}" method="POST" class="my-4 px-4">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ auth()->user()->name }}" placeholder="Nama">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">Telepon</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="bi bi-telephone-fill"></i>
                                </span>
                                <input type="text" name="telp" class="form-control" id="telp" value="" placeholder="0876543234">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">
                                    <i class="bi bi-geo-fill"></i>
                                </span>
                                <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Alamat Lengkap"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="paket" class="form-label">Paket</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon4">
                                    <i class="bi bi-list-ul"></i>
                                </span>
                                <select name="paket" id="paket" class="form-select">
                                    <option value="0" disabled>-Pilih Paket-</option>
                                    @php
                                        $pakets = App\Models\Paket::all();
                                    @endphp
                                    @foreach ($pakets as $item)
                                        <option {{ ($item->id == $paket->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama_paket." (Rp".number_format($item->harga, 0, 0, '.').")" }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between form-check form-switch" style="padding-left: 0;">
                            <label class="form-check-label " for="harian"><strong>Pesan untuk 1 hari</strong></label>
                            <input class="form-check-input" type="checkbox" role="switch" id="harian" checked>
                        </div>
                        <div id="durasi">
                            <div class="mb-3">
                                <label for="tgl" class="form-label">Tanggal Pesan</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon5">
                                        <i class="bi bi-calendar-date-fill"></i>
                                    </span>
                                    <input type="date" name="tgl" class="form-control" id="tgl" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="w-100 btn btn-primary">Pesan</button>
                    </form>          
                </div>
            </div>            
        </div>
    </div>

    
    @if (Session::has('error'))
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="errorModalLabel">Gagal</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ Session::get('error') }}
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
    </div>
    @endif
@endsection

@section('js')
@if (Session::has('error'))
<script>
    $(document).ready(function(){
        $('#errorModal').modal('show');
    })
</script>
@endif
    <script>
        $(document).ready(function(){
            $('#harian').change(function(){
                if($('#harian').is(":checked")){
                    var div = `<div class="mb-3">
                                    <label for="tgl" class="form-label">Tanggal Pesan</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">
                                            <i class="bi bi-calendar-date-fill"></i>
                                        </span>
                                        <input type="date" name="tgl" class="form-control" id="tgl" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>`;
                } else {
                    var div = `<div class="mb-3">
                                    <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">
                                            <i class="bi bi-calendar-date-fill"></i>
                                        </span>
                                        <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">
                                            <i class="bi bi-calendar-date-fill"></i>
                                        </span>
                                        <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" value="{{ date('Y-m-d', strtotime('tomorrow')) }}">
                                    </div>
                                </div>`;
                }
                $('#durasi').html(div);
            })
        })
    </script>
@endsection