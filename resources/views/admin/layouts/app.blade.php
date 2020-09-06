<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>@yield('title') | Iyasmzn</title>
@include('admin.layouts.link')
        
</head>
<body class="dashboard-page">

@include('admin.layouts.sidebar')
    
    <section class="wrapper scrollable">
        <nav class="user-menu">
            <a href="javascript:;" class="main-menu-access">
            <i class="icon-proton-logo"></i>
            <i class="icon-reorder"></i>
            </a>
        </nav>
        
@include('admin.layouts.nav')

        <div class="main-grid">
           @yield('content')
        </div>
        
        <!-- footer -->
@include('admin.layouts.footer')
        <!-- //footer -->
    </section>

@include('admin.layouts.java')
    
</body>
</html>