@extends('layouts.admin')

@section('content')
<div class="col-md-12 py-5">
    <div class="white_shd full margin_bottom_30">
        <div class="full graph_head justify-content-between d-flex">
            <div class="heading1 margin_0">
               <h2>Laporan Bulan Ini</h2>
            </div>
            <a onclick="window.print()" class="btn btn-primary text-white">Cetak <i class="fa fa-print"></i></a>
         </div>
       <div class="table_section padding_infor_info">
          <div class="table-responsive-sm">
             <table class="table table-bordered">
                <thead>
                   <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>No Telepon</th>
                      <th>Alamat</th>
                      <th>Paket</th>
                      <th>Tanggal</th>
                   </tr>
                </thead>
                <tbody>
                    @if (isset($pesanan))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pesanan as $item)
                    @php
                        $detail = sizeof($item->detail);
                    @endphp
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->telp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->detail[0]->paket->nama_paket }}</td>
                        <td>
                        @if ($detail > 1)
                        {{ Carbon\Carbon::parse($item->detail[0]->tgl)->format('d M Y')." s.d. ".Carbon\Carbon::parse($item->detail[$detail - 1]->tgl)->format('d M Y') }}
                        @else
                        {{ Carbon\Carbon::parse($item->detail[0]->paket->tgl)->format('d M Y') }}
                        @endif
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