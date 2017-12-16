<html>
	<head>
		@include('admin.header')
	</head>
	<body>
		<!-- TOP MENU ZONE -->
				@include('admin.topmenu')
		<!-- END TOP MENU ZONE -->
		
		<!-- HELLO ADMIN -->
				@include('admin.helloadmin')
		<!-- END HELLO ADMIN -->
		
		<!-- CONTENT -->
			<!-- PRIMARY MENU -->
				@include('admin.primarymenu')
			<!-- END PRIMARY MENU -->
			
			<!-- TTTLE ZONE -->
				@include('admin.title')
			<!-- TTTLE ZONE -->
			
			<!-- SUB MENU -->
				@yield('submenu')
			<!-- SUB MENU -->
			
			<div class="clearboth"></div>
				<center><img src="{{ asset('img/border1.PNG') }}" alt=""></center>
				<hr>
			<!-- PRIMARY CONTENT -->
				@include('admin.content')
			<!-- END PRIMARY CONTENT -->
				<hr>
			<!-- END SUB MENU -->
			<!-- END CONTENT -->
	
			<!-- FOOTER -->
				@include('admin.footer')
			<!-- END FOOTER -->
			
			<!-- Jquery, JS ZONE -->
				@include('admin.js')
			<!-- END Jquery, JS ZONE --> 
	</body>
</html>
