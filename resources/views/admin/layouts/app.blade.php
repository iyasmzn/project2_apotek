<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | iyasmzn~</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    @include('admin.layouts.link')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    @include('admin.layouts.topbar')
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    @include('admin.layouts.mobile-menu')
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    @include('admin.layouts.main-menu')
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    @yield('content')
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
    <!-- End Sale Statistic area-->
    <!-- Start Email Statistic area-->
    <!-- End Email Statistic area-->
    <!-- Start Realtime sts area-->
    <!-- End Realtime sts area-->
    <!-- Start Footer area-->
    @include('admin.layouts.footer')
    <!-- End Footer area-->
    @include('admin.layouts.java')
</body>

</html>