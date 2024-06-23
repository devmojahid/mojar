<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in with illustration - Tabler - Premium and Open Source dashboard template with responsive and high
        quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('base/assets') }}/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('base/assets') }}/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('base/assets') }}/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('base/assets') }}/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('base/assets') }}/css/demo.min.css?1684106062" rel="stylesheet" />
    @stack('adminStyle')

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class="d-flex flex-column bg-white">
    <script src="{{ asset('base/assets') }}/js/demo-theme.min.js?1684106062"></script>
    <div class="row g-0 flex-fill">
        <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
            <div class="container container-tight my-5 px-lg-5">
                <div class="text-center mb-4">
                    <a href="." class="navbar-brand navbar-brand-autodark"><img
                            src="{{ asset('base/assets') }}/static/logo.svg" height="36" alt=""></a>
                </div>
                @yield('content')
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Photo -->
            <div class="bg-cover h-100 min-vh-100"
                style="background-image: url({{ asset('base/assets') }}/static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg)">
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('base/assets') }}/js/tabler.min.js?1684106062" defer></script>
    <script src="{{ asset('base/assets') }}/js/demo.min.js?1684106062" defer></script>
    @stack('adminScripts')
</body>

</html>
