<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<title>@yield('title')</title>
	<meta name="description" content="@yield('description')">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ URL::current() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="manifest" href="/images/site.webmanifest">
    <!-- CSS -->
	@include('layouts.parts.css')
	@stack('css')
	<!-- END CSS -->
</head>
<body>
	<div class="site-wrap">
		<!-- HEADER -->
		@include('layouts.parts.header')
		<!-- END HEADER -->

        <div class="content">
			@yield('content')
		</div>

		<!-- FOOTER -->
		@include('layouts.parts.footer')
		<!-- END FOOTER -->
	</div>

	<!-- JS -->
	@include('layouts.parts.js')
	@stack('scripts')
	<!-- END JS -->
</body>
</html>
