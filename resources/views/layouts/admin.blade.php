<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{ asset('admin/style.css') }}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{ asset('admin/css/colors.css') }}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-select.css') }}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{ asset('admin/css/perfect-scrollbar.css') }}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}" />

      @yield('css')

    <title>Admin | Elis Salon</title>
</head>
<body class="dashboard dashboard_1">
    
    <div class="full_container">
        <div class="inner_container">
            @include('partials.adminnav')
            <div id="content">
                <!-- topbar -->
                <div class="topbar">
                   <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                            <div class="right_topbar" style="padding: 1rem; background-color: #ff5722; margin-top: 4px; margin-right: 5px;">
                                <div class="icon_info">
                                    <form action="{{ route('logout') }}" method="post" id="form-logout">
                                        @csrf
                                    </form>
                                    <a role="button" onclick="document.querySelector('#form-logout').submit();" style="color:white;"><span>Log Out</span></a>
                                </div>
                            </div>
                        </div>
                   </nav>
                </div>
                <!-- end topbar -->
                @yield('content')
             </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ asset('admin/js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ asset('admin/js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('admin/js/owl.carousel.js') }}"></script> 
    <!-- chart js -->
    <script src="{{ asset('admin/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/utils.js') }}"></script>
    <script src="{{ asset('admin/js/analyser.js') }}"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script src="js/chart_custom_style1.js"></script>
    @yield('js')
</body>
</html>