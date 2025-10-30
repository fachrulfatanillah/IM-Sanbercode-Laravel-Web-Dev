<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('template/src/assets/images/logos/seodashlogo.png') }}" />
    <link rel="stylesheet" href="{{asset('template/src/assets/css/styles.min.css')}}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        @include('partials.sidebar')
        <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
        <!--  Header Start -->
        @include('partials.header')
        <!--  Header End -->
        <div class="container-fluid">
            {{-- Start Body --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">@yield('title')</h5>
                    @yield('content')
                </div>
            </div>
            {{-- End Body --}}
        </div>
        </div>
    </div>
    <script src="{{ asset('template/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>