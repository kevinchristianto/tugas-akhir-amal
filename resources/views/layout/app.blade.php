<!doctype html>
<html lang="en">
<!-- [Head] start -->
<head>
    <title>@yield('title', '404') | SMK Industri Mandiri</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <base href="{{ url('/') }}">
    
    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />
    <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" id="main-font-link" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />
    
    @yield('custom-style')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->
<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ route('dashboard') }}" class="b-brand text-primary d-flex gap-2 align-items-center">
                    <!-- ========   Change your logo from here   ============ -->
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" class="logo logo-lg opacity-75" style="width: 3rem;" />
                    <h4 class="mb-0 text-secondary">SMK<br>Industri Mandiri</h4>
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item">
                        <a href="{{ route('dashboard') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="ti ti-dashboard"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="pc-item pc-caption">
                        <label>Transaksi</label>
                        <i class="ti ti-device-desktop-dollar"></i>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('transaksi.pendapatan') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="ti ti-receipt-dollar"></i>
                            </span>
                            <span class="pc-mtext">Administrasi Siswa</span>
                        </a>
                    </li>
                    @if (Auth::user()->level != 'tu')
                        <li class="pc-item">
                            <a href="{{ route('transaksi.index') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ti ti-cash-register"></i>
                                </span>
                                <span class="pc-mtext">Jurnal Umum</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->level != 'tu')
                        <li class="pc-item pc-caption">
                            <label>Laporan Keuangan</label>
                            <i class="ti ti-database"></i>
                        </li>
                        <li class="pc-item">
                            <a href="#" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ti ti-report-analytics"></i>
                                </span>
                                <span class="pc-mtext">Neraca</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="#" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ti ti-report-money"></i>
                                </span>
                                <span class="pc-mtext">Jurnal Umum</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->level == 'admin')
                        <li class="pc-item pc-caption">
                            <label>Master Data</label>
                            <i class="ti ti-database"></i>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('master.account.index') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ti ti-folder-dollar"></i>
                                </span>
                                <span class="pc-mtext">Akun Keuangan</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('master.siswa.index') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ti ti-user-square-rounded"></i>
                                </span>
                                <span class="pc-mtext">Murid & Wali Murid</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('master.guru.index') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ti ti-school"></i>
                                </span>
                                <span class="pc-mtext">Guru/Staf</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('master.user.index') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="pc-mtext">User</span>
                            </a>
                        </li>
                    @endif
                    
                </ul>
                <div class="w-100 text-center">
                    <div class="badge theme-version badge rounded-pill bg-light text-dark f-12"></div>
                </div>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <div class="header-wrapper"><!-- [Mobile Media Block] start -->
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <li class="pc-h-item header-mobile-collapse">
                        <a href="javascript:void(0)" class="pc-head-link head-link-secondary ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="javascript:void(0)" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0 d-flex align-items-center gap-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-user-square-rounded fs-1"></i>
                            <i class="ti ti-settings fs-1"></i>
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header">
                                <h4>{{ Auth::user()->name }}</h4>
                                <p class="text-muted">
                                    {{ Auth::user()->level == 'admin' ? '' : 'Staff ' }}
                                    {{ Auth::user()->level == 'tu' ? strtoupper(Auth::user()->level) : ucwords(Auth::user()->level) }}
                                </p>
                                <hr />
                                <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 280px)">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button class="dropdown-item">
                                            <i class="ti ti-logout"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->    
    
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            @hasSection('breadcrumb')
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">@yield('title', '404')</h5>
                                </div>
                            </div>
                            <div class="col-auto">
                                <ul class="breadcrumb">
                                    @yield('breadcrumb')
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- [ Main Content ] start -->
            <div class="row">
                @if (session()->has('success') || session()->has('error'))
                    <div class="col-12">
                        <div class="alert alert-{{ session()->has('success') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
                            {{ session()->get('success') ?? session()->get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissable fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endforeach
                @endif

                @yield('content')
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col-sm-6 my-1">
                    <p class="m-0">
                        Sistem Informasi Akuntansi SMK Industri Mandiri
                    </p>
                </div>
            </div>
        </div>
    </footer>

    @yield('modal-section')
    
    <!-- Required Js -->
    <script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script>
        change_box_container('false');
        layout_change('light');
        font_change('Roboto');
        layout_caption_change('true');
        layout_rtl_change('false');
        preset_change('preset-1');
    </script>

    @yield('custom-script')
</body>
<!-- [Body] end -->
</html>
