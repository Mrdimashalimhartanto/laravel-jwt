<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link href="{{ asset('assets/ciputra_medsos.png') }}" rel="icon">
    <link href="{{ asset('assets/ciputra_medsos.png') }}" rel="icon">
<head>
    
    <title>@yield('title')| CMS - EPAY</title>
</head>
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    
        @yield('content')
</body>
</html>