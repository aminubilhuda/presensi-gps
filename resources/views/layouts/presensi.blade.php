<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" /> --}}
    {{-- <meta http-equiv="Pragma" content="no-cache" /> --}}
    {{-- <meta http-equiv="Expires" content="0" /> --}}
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    {{-- <meta name="apple-mobile-web-app-capable" content="yes" /> --}}
    {{-- <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"> --}}
    {{-- <meta name="theme-color" content="#000000"> --}}
    <title>Mobilekit Mobile UI Kit</title>
    {{-- <meta name="description" content="Mobilekit HTML Mobile UI Kit"> --}}
    {{-- <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" /> --}}
    {{-- <link rel="icon" type="image/png" href="{{asset ('assetsk/img/favicon.png')}}" sizes="32x32"> --}}
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{asset ('assetsk/img/icon/192x192.png')}}"> --}}
    <link rel="stylesheet" href="{{asset ('assetsk/css/style.css')}}">
    <link rel="manifest" href="__manifest.json">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body style="background-color:#e9ecef;">

    <!-- loader -->
    {{-- <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div> --}}
    <!-- * loader -->

    @yield('header')

    <!-- App Capsule -->
    <div class="container">
        @yield('content')
    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    @include('layouts.bootNav')
    <!-- * App Bottom Menu -->




    <!-- ///////////// Js Files ////////////////////  -->
    @include('layouts.script')

</body>

</html>