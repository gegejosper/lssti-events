<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>LSSTI | Student Event Attendance with Biometric System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{asset('assets/css/pages/login/classic/login-2.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{asset('assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{asset('assets/media/lssti_logo.png')}}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<!--begin::Aside-->
				<div class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bgi-size-cover bgi-no-repeat p-7 p-lg-10">
					<!--begin: Aside Container-->
					<div class="d-flex flex-row-fluid flex-column justify-content-between">
						<!--begin::Aside body-->
						<div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
							<a href="/" class="mb-0 text-center">
								<img src="{{asset('assets/media/lssti_logo.png')}}" class="max-h-250px" alt="" style="width:250px;"/>
							</a>
							
						</div>
						<!--end::Aside body-->
						<!--begin: Aside footer for desktop-->
						<div class="d-flex flex-column-auto justify-content-between mt-15">
							<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2023 LSSTI-SEA</div>

						</div>
						<!--end: Aside footer for desktop-->
					</div>
					<!--end: Aside Container-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column text-center" style="background-image: url({{asset('assets/media/bg/bg-2.jpg')}}); background-position-y: center;
    background-size: cover; background-repeat:no-repeat;">
					<!--begin::Content body-->
					<div class="d-flex justify-content-center pt-20">
						<div class="d-flex flex-column justify-content-center text-center">
                            <h1 class="text-white" style="font-size:30px;">LSSTI | Student Event Attendance with Biometric System</h1>
                            <h2 class="text-white mt-10">
                                EVENT : {{$event->event_name}}
                            </h2>
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}     
                                </div>
                            @endif
                            <div>
                                
                                @php 
                                switch ($logtype->log_type) {
                                    case 0:
                                    $log_type="Login";
                                    break;
                                    case 1:
                                        $log_type="Logout";
                                    break;
                                
                                    default:
                                        $log_type="Error";
                                }
                                @endphp
                                <br>
                                <h3>LOG TYPE:  {{$log_type}}</h2>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col col-lg-4">
                                    <div class="card" >
                                        <div class="card-body">
                                            @if($logtype->log_type == 1)
                                            <a href="/update/log/0" class="btn btn-info">Login</a>
                                            @else
                                            <a href="/update/log/1" class="btn btn-success">Logout</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
						</div>
					</div>
					<!--end::Content body-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<script>
			// Function to refresh the page
			function refresh_page() {
			location.reload();
			}

			// Set the refresh interval to 5 seconds (5000 milliseconds)
			var refresh_interval = 5000;

			// Set up the interval to call the refresh_page function
			var interval_id = setInterval(refresh_page, refresh_interval);
		</script>
        <script type="text/javascript" src="{{asset('js/clock.js')}}"></script>
		<!--end::Main-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/custom/login/login-general.js')}}"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>