<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>ANHS | Student Online Attendance</title>
		<meta name="description" content="Login page example" />
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
		<link rel="shortcut icon" href="{{asset('assets/media/anhs-logo.png')}}" />
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
								<img src="{{asset('assets/media/anhs-logo.png')}}" class="max-h-250px" alt="" style="width:350px;"/>
							</a>
							<!--begin::Signin-->
							<div class="login-form login-signin">
                                    
                                <div class="text-center mb-10 mb-lg-20">
									<h2 class="font-weight-bold">Sign In</h2>
									<p class="text-muted font-weight-bold">Enter your username and password</p>
								</div>
                                <!--begin::Form-->
                                <!-- Session Status -->
                                @if($errors->count() != 0)
                                    <div class="alert alert-danger">
                                        <x-auth-session-status class="mb-4" :status="session('status')" />
                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" /> 
                                     </div>
                                 @endif
                                
                                
								<form class="form" novalidate="novalidate" id="kt_login_forgot_form" method="POST" action="{{ route('login') }}">
                                    @csrf
									<div class="form-group py-3 m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Username" placeholder="Username" name="username" autocomplete="off" />
									</div>
									<div class="form-group py-3 border-top m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Password" placeholder="Password" name="password" id="password" required autocomplete="current-password"/>
									</div>
									<div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
										<div class="checkbox-inline">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
										</div>
										<a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">Forgot Password ?</a>
									</div>
									<div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">
										<div class="my-3 mr-2">
											<!-- <span class="text-muted mr-2">Don't have an account?</span>
											<a href="javascript:;" id="kt_login_signup" class="font-weight-bold">Signup</a> -->
										</div>
										<input type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3" value="Sign In">
									</div>
								</form>
								<!--end::Form-->
							</div>
							<!--end::Signin-->
							<!--begin::Signup-->
							<div class="login-form login-signup">
								<div class="text-center mb-10 mb-lg-20">
									<h3 class="">Sign Up</h3>
									<p class="text-muted font-weight-bold">Enter your details to create your account</p>
								</div>
								<!--begin::Form-->
								<form class="form" novalidate="novalidate" id="kt_login_signup_form">
									<div class="form-group py-3 m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Fullname" name="fullname" autocomplete="off" />
									</div>
									<div class="form-group py-3 border-top m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Email" name="email" autocomplete="off" />
									</div>
									<div class="form-group py-3 border-top m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Password" name="password" autocomplete="off" />
									</div>
									<div class="form-group py-3 border-top m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Confirm password" name="cpassword" autocomplete="off" />
									</div>
									<div class="form-group mt-5">
										<div class="checkbox-inline">
											<label class="checkbox checkbox-outline">
											<input type="checkbox" name="agree" />
											<span></span>I Agree the
											<a href="#" class="ml-1">terms and conditions</a>.</label>
										</div>
									</div>
									<div class="form-group d-flex flex-wrap flex-center">
										<button id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
										<button id="kt_login_signup_cancel" class="btn btn-outline-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
									</div>
								</form>
								<!--end::Form-->
							</div>
							<!--end::Signup-->
							<!--begin::Forgot-->
							<div class="login-form login-forgot">
								<div class="text-center mb-10 mb-lg-20">
									<h3 class="">Forgotten Password ?</h3>
									<p class="text-muted font-weight-bold">Enter your email to reset your password</p>
								</div>
								<!--begin::Form-->
								<form class="form" novalidate="novalidate" id="kt_login_forgot_form">
									<div class="form-group py-3 border-bottom mb-10">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="email" placeholder="Email" name="email" autocomplete="off" />
									</div>
									<div class="form-group d-flex flex-wrap flex-center">
										<button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
										<button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
									</div>
								</form>
								<!--end::Form-->
							</div>
							<!--end::Forgot-->
						</div>
						<!--end::Aside body-->
						<!--begin: Aside footer for desktop-->
						<div class="d-flex flex-column-auto justify-content-between mt-15">
							<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2021 ANHS-SOA</div>
							<div class="d-flex order-1 order-sm-2 my-2">
								<a href="#" class="text-muted text-hover-primary">Privacy</a>
								<a href="#" class="text-muted text-hover-primary ml-4">Legal</a>
								<a href="#" class="text-muted text-hover-primary ml-4">Contact</a>
							</div>
						</div>
						<!--end: Aside footer for desktop-->
					</div>
					<!--end: Aside Container-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column p-7" style="background-image: url({{asset('assets/media/bg/bg-3.jpg')}}); background-position-y: center;
    background-size: cover; background-repeat:no-repeat;">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-lg-center">
						<div class="d-flex flex-column justify-content-center">
							<h4 class="display-3 font-weight-bold my-7 text-white">SHS-ANHS SOA</h4>
							<p class="font-weight-bold font-size-lg text-white">
							<br />Student Online Attendance with Biometric System</p>
						</div>
					</div>
					<!--end::Content body-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
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