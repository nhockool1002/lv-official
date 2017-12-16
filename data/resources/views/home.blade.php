<html>
	<head>
        @include('home.header')
	</head>
	<body>
	<!-- MENU -->
        @include('home.menu')
    <!-- MENU -->
    <!-- Sidebar  -->
        @yield('sidebar')
    <!-- Sidebar  -->
    <!-- Content  -->
        @yield('content')
    <!-- Content  -->
    <!-- Phân trang-->
        @yield('pagination')
    <!-- Phân trang-->
        @include('home.script')
	</body>
	    @include('home.footer')
</html>
