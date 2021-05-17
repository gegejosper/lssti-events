
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
    <title>@yield('title') - ANHS-SOA</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="ANHS-SOA" name="description">
    <meta content="ANHS-SOA, student online attendance" name="keywords">
    <meta content="ANHS-SOA" name="author">

    <meta property="og:site_name" content="ANHS-SOA">
    <meta property="og:title" content="ANHS-SOA">
    <meta property="og:description" content="ANHS-SOA Portal">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{asset('assets/media/anhs-logo.png')}}"><!-- link to image for socio -->
    <meta property="og:url" content="http://jujiedso.com">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{asset('assets/css/pages/login/login-2.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
        <link rel="shortcut icon" href="{{asset('assets/media/anhs-logo.png')}}" />
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }
            .code {
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
            </style>
    </head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white" id="kt_login">
				<!--begin::Aside-->
				<div class="login-aside position-relative overflow-hidden order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto py-9 px-7 py-lg-13 px-lg-35">
					<!--begin: Aside Container-->
					<div class="d-flex flex-row-fluid flex-column justify-content-between">
						<!--begin::Logo-->
						<a href="/" class="text-center pt-2">
						<img src="{{asset('assets/media/anhs-logo.png')}}" class="max-h-250px" alt="" style="width:350px;"/>
						</a>
						<!--end::Logo-->
						<!--begin::Aside body-->
						<div class="d-flex flex-column-fluid flex-column flex-center">
							<!--begin::Signin-->
							<div class="login-form login-signin py-11">
                               @yield('content')
							</div>
							<!--end::Signin-->
							
							
						</div>
						<!--end::Aside body-->
						
					</div>
					<!--end: Aside Container-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="content order-1 order-lg-2 flex-column-row-auto flex-grow-1 pt-md-0 pb-40 bgi-no-repeat bgi-position-y-center bgi-position-x-center" style="background-image: url({{asset('assets/media/bg/bg-3.jpg')}}); background-position-y: center;
    background-size: cover; background-repeat:no-repeat;">
					<!--begin::Content body-->
					<div class="d-flex flex-center pb-lg-40 pt-lg-0 pt-md-0 pb-40">
						<div class="d-flex flex-column justify-content-center text-center pt-xl-30 pt-lg-20 pb-sm-10">
						<h4 class="display-3 font-weight-bold my-7 text-white">ANHS-SOA Panel</h4>
							<p class="font-weight-bold font-size-lg text-white opacity-80">
							
						</div>
					</div>
					<!--end::Content body-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/custom/login/login.js')}}"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>