@extends('layouts.admin')

@section('content')
<div class="col-md-12 py-5">
    <div class="white_shd full margin_bottom_30">
       <div class="full graph_head justify-content-between d-flex">
          <div class="heading1 margin_0">
             <h2>Daftar Paket</h2>
          </div>
          <a href="{{ route('admin.paket.tambah') }}" class="btn btn-primary">Tambah (+)</a>
       </div>
       <div class="table_section padding_infor_info">
          <div class="table-responsive-sm">
             <table class="table table-bordered">
                <thead>
                   <tr>
                      <th>No</th>
                      <th>Nama Paket</th>
                      <th>Harga</th>
                      <th>Gambar</th>
                      <td style="width: 100px;">Aksi</th>
                   </tr>
                </thead>
                <tbody>
                    @if (isset($paket))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($paket as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama_paket }}</td>
                        <td>Rp{{ number_format($item->harga, 0, 0, '.') }}</td>
                        <td>
                            <img src="{{ asset('paket/'.$item->gambar) }}" alt="" class="w-25">
                        </td>
                        <td style="width: 100px;">
                            <a href="{{ route('admin.paket.ubah', ['id' => $item->id]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('admin.paket.hapus', ['id' => $item->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                    @endforeach
                    @endif
                </tbody>
             </table>
          </div>
       </div>
    </div>
</div> 
@endsection