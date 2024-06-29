<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head><base href=""/>
	<title>@yield('page-title', 'Home') &mdash; Pemrograman Akuntansi</title>
	<meta charset="utf-8" />
	<meta name="description" content="Saul HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
	<meta name="keywords" content="Saul, bootstrap, bootstrap 5, dmin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Saul HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
	<meta property="og:url" content="https://keenthemes.com/products/saul-html-pro" />
	<meta property="og:site_name" content="Keenthemes | Saul HTML Free" />
	<link rel="canonical" href="https://preview.keenthemes.com/saul-html-free" />
	<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
	<!--begin::Fonts(mandatory for all pages)-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Vendor Stylesheets(used for this page only)-->
	<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
	<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
	<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" data-kt-app-aside-enabled="true" data-kt-app-aside-fixed="true" data-kt-app-aside-push-toolbar="true" data-kt-app-aside-push-footer="true" class="app-default">
	<!--begin::Theme mode setup on page load-->
	<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
	<!--end::Theme mode setup on page load-->
	<!--begin::App-->
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<!--begin::Page-->
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
			<!--begin::Header-->
			<div id="kt_app_header" class="app-header d-flex flex-column flex-stack">
				<!--begin::Header main-->
				<div class="d-flex align-items-center flex-stack flex-grow-1">
					<div class="app-header-logo d-flex align-items-center justify-content-end flex-stack px-lg-11" id="kt_app_header_logo">
						<!--begin::Sidebar mobile toggle-->
						<div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none" id="kt_app_sidebar_mobile_toggle">
							<i class="ki-duotone ki-abstract-14 fs-2">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</div>
						<!--end::Sidebar mobile toggle-->
						<!--begin::Sidebar toggle-->
						<div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-sm btn-icon btn-color-warning me-n2 d-none d-lg-flex" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
							<div class="btn btn-icon btn-active-color-primary w-35px h-35px">
								<i class="ki-duotone ki-abstract-14 fs-1">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</div>
						</div>
						<!--end::Sidebar toggle-->
					</div>
					<!--begin::Navbar-->
					<div class="app-navbar flex-grow-1 justify-content-end me-5" id="kt_app_header_navbar">
						<!--begin::User menu-->
						<div class="app-navbar-item ms-3 ms-lg-4 me-lg-1" id="kt_header_user_menu_toggle">
							<!--begin::Menu wrapper-->
							<div class="cursor-pointer symbol symbol-30px symbol-lg-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
								<img src="https://avatar.iran.liara.run/public/22" alt="user" />
							</div>
							<!--begin::User account menu-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<div class="menu-content d-flex align-items-center px-3">
										<!--begin::Avatar-->
										<div class="symbol symbol-50px me-5">
											<img alt="Logo" src="https://avatar.iran.liara.run/public/22" />
										</div>
										<!--end::Avatar-->
										<!--begin::Username-->
										<div class="d-flex flex-column">
											<div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }}
											</div>
											<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
										</div>
										<!--end::Username-->
									</div>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu separator-->
								<div class="separator my-2"></div>
								<!--end::Menu separator-->
								<!--begin::Menu item-->
								<div class="menu-item px-5">
									<a href="{{ route('logout') }}" class="menu-link px-5">Sign Out</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::User account menu-->
							<!--end::Menu wrapper-->
						</div>
						<!--end::User menu-->
					</div>
					<!--end::Navbar-->
				</div>
				<!--end::Header main-->
				<!--begin::Separator-->
				<div class="app-header-separator"></div>
				<!--end::Separator-->
			</div>
			<!--end::Header-->
			<!--begin::Wrapper-->
			<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
				<!--begin::Sidebar-->
				<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
					<!--begin::Main-->
					<div class="d-flex flex-column justify-content-between h-100 hover-scroll-overlay-y my-2 d-flex flex-column" id="kt_app_sidebar_main" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px">
						<!--begin::Logo-->
						<a href="{{ url('/') }}" class="app-sidebar-logo text-center mb-10">
							<img alt="Logo" src="{{ asset('assets/media/logos/logo_sd.png') }}" class="h-100px">
						</a>
						<!--end::Logo-->
						<!--begin::Sidebar menu-->
						<div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="flex-column-fluid menu menu-sub-indention menu-column menu-rounded menu-active-bg mb-7">
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link {{ Route::is('home') ? 'active' : null }}" href="{{ route('home') }}">
									{{-- <i class="bi bi-house-door fs-2 ms-1 me-4"></i> --}}
									<i data-feather="home" class="me-4 ms-1 w-20px"></i>
									<span class="menu-title">Home</span>
								</a>
								<!--end:Menu link-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="click" class="menu-item {{ Route::is('master.*') ? 'show' : null }} here menu-accordion">
								<!--begin:Menu link-->
								<span class="menu-link">
									<i data-feather="database" class="me-4 ms-1 w-20px"></i>
									<span class="menu-title">Master Data</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-accordion" kt-hidden-height="242">
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link {{ Route::is('master.siswa.*') ? 'active' : null }}" href="{{ route('master.siswa.index') }}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Data Siswa</span>
										</a>
										<!--end:Menu link-->
										<!--begin:Menu link-->
										<a class="menu-link {{ Route::is('master.guru.*') ? 'active' : null }}" href="{{ route('master.guru.index') }}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Data Guru</span>
										</a>
										<!--end:Menu link-->
										<!--begin:Menu link-->
										<a class="menu-link {{ Route::is('master.jenis_transaksi.*') ? 'active' : null }}" href="{{ route('master.jenis_transaksi.index') }}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Jenis Transaksi</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="click" class="menu-item {{ Route::is('pemasukan.*') ? 'show' : null }} here menu-accordion">
								<!--begin:Menu link-->
								<span class="menu-link">
									<i data-feather="minimize-2" class="me-4 ms-1 w-20px"></i>
									<span class="menu-title">Transaksi Pemasukan</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-accordion" kt-hidden-height="242">
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link {{ Route::is('pemasukan.pendaftaran.*') ? 'active' : null }}" href="{{ route('pemasukan.pendaftaran.index') }}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Pendaftaran Siswa</span>
										</a>
										<!--end:Menu link-->
										<!--begin:Menu link-->
										<a class="menu-link {{ Route::is('pemasukan.spp.*') ? 'active' : null }}" href="{{ route('pemasukan.spp.index') }}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Pembayaran SPP</span>
										</a>
										<!--end:Menu link-->
										<!--begin:Menu link-->
										<a class="menu-link {{ Route::is('pemasukan.ujian.*') ? 'active' : null }}" href="{{ route('pemasukan.ujian.index') }}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Biaya Ujian</span>
										</a>
										<!--end:Menu link-->
										<!--begin:Menu link-->
										{{-- <a class="menu-link {{ Route::is('pemasukan.lainnya.*') ? 'active' : null }}" href="{{ route('pemasukan.lainnya.index') }}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Pemasukan Lainnya</span>
										</a> --}}
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="click" class="menu-item {{ Route::is('pengeluaran.*') ? 'show' : null }} here menu-accordion">
								<!--begin:Menu link-->
								<span class="menu-link">
									<i data-feather="maximize-2" class="me-4 ms-1 w-20px"></i>
									<span class="menu-title">Transaksi Pengeluaran</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-accordion" kt-hidden-height="242">
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link {{ Route::is('pengeluaran.gaji.*') ? 'active' : null }}" href="{{ route('pengeluaran.gaji.index') }}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Penggajian Guru</span>
										</a>
										<!--end:Menu link-->
										<!--begin:Menu link-->
										{{-- <a class="menu-link {{ Route::is('pengeluaran.lainnya.*') ? 'active' : null }}" href="{{ route('pengeluaran.lainnya.index') }}">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Pengeluaran Lainnya</span>
										</a> --}}
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link {{ Route::is('laporan.index') ? 'active' : null }}" href="{{ route('laporan.index') }}">
									{{-- <i class="bi bi-house-door fs-2 ms-1 me-4"></i> --}}
									<i data-feather="file-text" class="me-4 ms-1 w-20px"></i>
									<span class="menu-title">Laporan</span>
								</a>
								<!--end:Menu link-->
							</div>
							<!--end:Menu item-->
						</div>
						<!--end::Sidebar menu-->
					</div>
					<!--end::Main-->
				</div>
				<!--end::Sidebar-->
				<!--begin::Main-->
				<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
					<!--begin::Content wrapper-->
					@yield('main-content')
					<!--end::Content wrapper-->
					<!--begin::Footer-->
					<div id="kt_app_footer" class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3">
						<!--begin::Copyright-->
						<div class="text-dark order-2 order-md-1">
							<span class="text-muted fw-semibold me-1">2024&copy;</span>
							<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Kelompok 2 - Pemrograman Akuntansi</a>
						</div>
						<!--end::Copyright-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end:::Main-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::App-->

	@yield('modal-section')
</div>
@include('sweetalert::alert')
<!--end::Modal - Invite Friend-->
<!--end::Modals-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/global/fonts/feather/feather.min.js') }}"></script>
<script>
	feather.replace()
</script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>