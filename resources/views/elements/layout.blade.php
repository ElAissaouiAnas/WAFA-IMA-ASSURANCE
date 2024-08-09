<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Assurance Voyage - WAFA IMA</title>
    <link rel="shortcut icon" type="x-icon" href="/images/logoTab.png">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/slider.layerslider/css/layerslider.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/essentials.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/layout.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/header-1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/color_scheme/blue.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/mine.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ asset('assets/css/app.css')}}?v=1" rel="stylesheet" type="text/css" /> -->
    @yield('stylesheets')
    <style>
    .radio,
    .checkbox {
        padding-top: 5px
    }

    .has-feedback .form-control-feedback {
        display: none !important
    }

    .sf-toolbar {
        display: none !important
    }
    </style>
    <!-- Google Tag Manager -->
    <!-- <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-MC3TKM4N');
    window.dataLayer = window.dataLayer || []

    function gtag() {
        dataLayer.push(dl);
    }
    gtag('js', new Date());

    gtag('config', 'GTM-MC3TKM4N', {
        'debug_mode': true
    });
    </script> -->


    <!-- End Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H7MK6MVBK8"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-H7MK6MVBK8');
    </script>


</head>

<body class="smoothscroll enable-animation">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NSGKWCC" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
        @include('elements/header')
        @yield('main')
        @include('elements/footer')
    </div>
    <div id="preloader">
        <div class="inner">
            <span class="loader"></span>
        </div>
    </div>
    <!-- JAVASCRIPT FILES -->
    <script type="text/javascript">
    var plugin_path = "{{ asset('assets/plugins/')}}";
    </script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery-2.1.4.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- LAYER SLIDER -->
    <script type="text/javascript" src="{{ asset('assets/plugins/slider.layerslider/js/layerslider_pack.js')}}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/view/demo.layerslider_slider.js')}}"></script>

    <!-- SCRIPTS -->
    <script type="text/javascript" src="{{ asset('assets/js/scripts.js')}}"></script>
    @yield('javascripts')
</body>

</html>