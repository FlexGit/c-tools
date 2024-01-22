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
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="">
    <meta property="og:type" content="">
    <meta property="og:image" content="">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:site_name" content="Композитные технологии и оснастка">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "компания <?=isset($settingItems['company-name']) ? strip_tags($settingItems['company-name']->value) : ''?>",
            "logo": "<?=isset($settingItems['logo']) ? url(asset('storage/' . $settingItems['logo']->image)) : ''?>",
            "url": "<?=url('/')?>>",
            "description":"<?=isset($settingItems['company-description']) ? strip_tags($settingItems['company-description']->value) : ''?>",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "<?=isset($settingItems['office-address']) ? strip_tags($settingItems['office-address']->value) : ''?>",
                "addressLocality": "Балашиха",
                "addressRegion": "Московская область",
                "postalCode": "143983",
                "addressCountry": "Russia"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "<?=isset($settingItems['phone1']) ? strip_tags($settingItems['phone1']->value) : ''?>"
            }
        }
    </script>
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
