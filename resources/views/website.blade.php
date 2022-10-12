<!doctype html>
<html class="modern fixed has-top-menu has-left-sidebar-half sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Topdawg Website</title>
		<meta name="keywords" content="Topdawg Website" />
		<meta name="description" content="Topdawg">
		<meta name="author" content="Topdawg.net">

        <!-- Title Logo -->
        <link rel="shortcut icon" href="{{asset('ThemeData/img/logo-default.png')}}">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,600,700,800,900" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('ThemeData/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{asset('ThemeData/vendor/animate/animate.compat.css')}}">
		<link rel="stylesheet" href="{{asset('ThemeData/vendor/font-awesome/css/all.min.css')}}" />
		<link rel="stylesheet" href="{{asset('ThemeData/vendor/boxicons/css/boxicons.min.css')}}" />
		<link rel="stylesheet" href="{{asset('ThemeData/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{asset('ThemeData/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}"/>
		<link rel="stylesheet" href="{{asset('ThemeData/vendor/datatables/media/css/dataTables.bootstrap5.css')}}" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('ThemeData/css/theme.css')}}" />

		<!-- Theme Layout -->
		<link rel="stylesheet" href="{{asset('ThemeData/css/layouts/modern.css')}}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{asset('ThemeData/css/skins/default.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('ThemeData/css/custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('ThemeData/vendor/modernizr/modernizr.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<section class="body">

			<!-- start: header -->
            @include('Header.index')
			<!-- end: header -->

			<div class="inner-wrapper">
            <!-- start: sidebar -->
			@include('Sidebar.index')
            <!-- end: sidebar -->

            <!-- start: Dashboard content -->
            @yield('content')
            <!-- end: Dashboard content -->

			</div>

		</section>
		@if(\Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_enabled'))
		<script src="https://unpkg.com/@shopify/app-bridge{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
		<script src="https://unpkg.com/@shopify/app-bridge-utils{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
		<script @if(\Osiset\ShopifyApp\Util::getShopifyConfig('turbo_enabled')) data-turbolinks-eval="false" @endif>
			var AppBridge = window['app-bridge'];
			var actions = AppBridge.actions;
			var utils = window['app-bridge-utils'];
			var createApp = AppBridge.default;
			var app = createApp({
				apiKey: "{{ \Osiset\ShopifyApp\Util::getShopifyConfig('api_key', $shopDomain ?? Auth::user()->name ) }}"
				, shopOrigin: "{{ $shopDomain ?? Auth::user()->name }}"
				, host: "{{ \Request::get('host') }}"
				, forceRedirect: true
			, });
		
		</script>
		@include('shopify-app::partials.token_handler')
		@include('shopify-app::partials.flash_messages')
		@endif
		<!-- Vendor -->
		<script src="{{asset('ThemeData/vendor/jquery/jquery.js')}}"></script>
		<script src="{{asset('ThemeData/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		<script src="{{asset('ThemeData/vendor/popper/umd/popper.min.js')}}"></script>
		<script src="{{asset('ThemeData/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('ThemeData/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('ThemeData/vendor/common/common.js')}}"></script>
		<script src="{{asset('ThemeData/vendor/nanoscroller/nanoscroller.js')}}"></script>
		<script src="{{asset('ThemeData/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
		<script src="{{asset('ThemeData/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

		<!-- Specific Page Vendor -->
		<script src="{{asset('ThemeData/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('ThemeData/vendor/datatables/media/js/dataTables.bootstrap5.min.js')}}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('ThemeData/js/theme.js')}}"></script>

		<!-- Theme Custom -->
		<script src="{{asset('ThemeData/js/custom.js?v=4040')}}"></script>
		<script src="{{asset('ThemeData/js/profile.js?v=4141')}}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{asset('ThemeData/js/theme.init.js')}}"></script>

		<!-- Examples -->
		<script src="{{asset('ThemeData/js/examples/examples.header.menu.js')}}"></script>
		<script src="{{asset('ThemeData/js/examples/examples.ecommerce.datatables.list.js')}}"></script>

	</body>
</html>