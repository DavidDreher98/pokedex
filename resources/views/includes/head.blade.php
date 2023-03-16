@php
    $versao = '0.0';
@endphp

<link rel="preload" as="style"  href="{{ mix('css/style.css') }}?v={{ $versao }}">
<link rel="stylesheet"          href="{{ mix('css/style.css') }}?v={{ $versao }}">
<link rel="preload" as="style"  href="{{ mix('css/responsive.css') }}?v={{ $versao }}">
<link rel="stylesheet"          href="{{ mix('css/responsive.css') }}?v={{ $versao }}">
<link rel="preload" as="style"  href="{{ mix('css/fonts.css') }}?v={{ $versao }}">
<link rel="stylesheet"          href="{{ mix('css/fonts.css') }}?v={{ $versao }}">

<script type="application/javascript" src="{{ asset('js/app.js' )}}?v={{ $versao }}"></script>