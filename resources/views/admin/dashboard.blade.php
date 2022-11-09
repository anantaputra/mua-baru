@extends('layouts.admin')

@section('content')
    <!-- dashboard inner -->
    <div class="midde_cont">
        <div class="container-fluid">
           <div class="row column_title">
              <div class="col-md-12">
                 <div class="page_title">
                    <h2>Dashboard</h2>
                 </div>
              </div>
           </div>
           <div class="row column1">
              <div class="col-md-6 col-lg-4">
                 <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                       <div> 
                          <i class="fa fa-user yellow_color"></i>
                       </div>
                    </div>
                    <div class="counter_no">
                       <div>
                        @php
                            $user = App\Models\User::count();
                        @endphp
                          <p class="total_no">{{ $user }}</p>
                          <p class="head_couter">Pengguna</p>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-lg-4">
                 <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                       <div> 
                          <i class="fa fa-list-ul blue1_color"></i>
                       </div>
                    </div>
                    <div class="counter_no">
                       <div>
                        @php
                            $pakets = App\Models\Paket::count();
                        @endphp
                          <p class="total_no">{{ $pakets }}</p>
                          <p class="head_couter">Paket</p>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-lg-4">
                 <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                       <div> 
                          <i class="fa fa-table green_color"></i>
                       </div>
                    </div>
                    <div class="counter_no">
                       <div>
                        @php
                            $pesanans = App\Models\Pesanan::where('status', 'settlement')
                                        ->with(['detail' => function($q){
                                            $q->whereDate('tgl', '>=', Carbon\Carbon::today())->get();
                                        }])
                                        ->get()->count();
                        @endphp
                          <p class="total_no">{{ $pesanans }}</p>
                          <p class="head_couter">Pesanan Baru</p>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>
    <!-- end dashboard inner -->
@endsection