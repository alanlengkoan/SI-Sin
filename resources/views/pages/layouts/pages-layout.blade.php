<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Sistem Informasi Sekolah {{ config('app.name') }}">
    <meta name="keywords" content="Sistem Informasi Sekolah {{ config('app.name') }}">
    <meta name="author" content="Sistem Informasi Sekolah {{ config('app.name') }}">
    <title>{{ config('app.name') }} | {{ $title }}</title>

    <!-- begin:: icon -->
    <link rel="apple-touch-icon" href="{{ asset_admin('images/icon/apple-touch-icon.png') }}" sizes="180x180" />
    <link rel="icon" href="{{ asset_admin('images/icon/favicon-32x32.png') }}" type="image/x-icon" sizes="32x32" />
    <link rel="icon" href="{{ asset_admin('images/icon/favicon-16x16.png') }}" type="image/x-icon" sizes="16x16" />
    <link rel="icon" href="{{ asset_admin('images/icon/favicon.ico') }}" type="image/x-icon" />
    <!-- end:: icon -->

    <!-- begin:: css global -->
    <link href="{{ asset_pages('plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset_pages('plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset_pages('plugins/themify-icons/themify-icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset_pages('plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset_pages('plugins/aos/aos.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset_pages('plugins/venobox/venobox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset_pages('css/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- end:: css global -->

    <script type="text/javascript" preload src="{{ asset_pages('plugins/jQuery/jquery.min.js') }}"></script>

    <!-- begin:: css local -->
    @stack('css')
    <!-- end:: css local -->
</head>

<body>
    <!-- begin:: navbar -->
    <x-pages-navbar />
    <!-- end:: navbar -->

    <!-- begin:: body -->
    {{ $slot }}
    <!-- end:: body -->

    <!-- begin:: footer -->
    <x-pages-footer />
    <!-- end:: footer -->

    <!-- begin:: js global -->
    <script type="text/javascript" src="{{ asset_pages('plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset_pages('plugins/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset_pages('plugins/aos/aos.js') }}"></script>
    <script type="text/javascript" src="{{ asset_pages('plugins/venobox/venobox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset_pages('plugins/mixitup/mixitup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset_pages('plugins/google-map/gmap.js') }}"></script>
    <script type="text/javascript" src="{{ asset_pages('js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset_admin('my_assets/my_fun.js') }}"></script>
    <!-- end:: js global -->

    <!-- begin:: js local -->
    @stack('js')
    <!-- end:: js local -->
</body>

</html>