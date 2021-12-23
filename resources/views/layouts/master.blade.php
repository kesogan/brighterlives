<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,900italic,700italic,900,700,500italic,500,400italic,300italic,300,100italic,100|Open+Sans:400,300,400italic,300italic,600,600italic,700italic,700,800|Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700' rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/layerslider/css/layerslider.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/yellow.css" title="hunter-green" />
        <link href="/css/contact.css" rel="stylesheet" type="text/css" /> <!-- AJAX Contact Form Stylesheet -->
        
        <!-- Scripts -->
        <script src="/js/jquery-2.2.2.js" type="text/javascript"></script>
        <script src="/js/perfect-scrollbar.jquery.js" type="text/javascript"></script>
        <script src="/js/perfect-scrollbar.js" type="text/javascript"></script>
        <script src='/js/bootstrap.js'></script>
        <script src="/js/html5lightbox.js"></script>
        <script src="/js/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/jquery.jigowatt.js"></script><!-- AJAX Form Submit -->
        <script src='/js/script.js'></script>		
        <script defer src="/js/jquery.flexslider.js"></script>
        <script defer src="/js/jquery.mousewheel.js"></script>

        <!-- Single Page JS -->
        @yield('page-js')

    </head>
    <body>
        <div class="theme-layout">
            <!-- include topbar -->
            @include('includes.topbar')

            <!-- include navbar -->
            @include('includes.navbar')

            <!-- Slider/Header area -->
            @yield('header')

            <!-- Individual Page Content -->
            @yield('content')

            <!-- include footer -->
            @include('includes.footer')

            <!-- include bottom-footer -->
            @include('includes.footer-bottom')
        </div>
        @include('includes.modals')
    </body>
</html>
