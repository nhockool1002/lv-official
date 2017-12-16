<div class="col-md-9">
		<div class="container">
			<header>
		        <h1>{{$book->book_name}}</h1>
			</header>
		<hr class="stylehr">
		<div style="height: 550px; background-color: white; border: #000 solid; ">
		    <iframe src="{{ asset("upload/file/web/viewer.html?file=") }}../book/{{$book->filename}}" frameborder="1" width="100%" height="100%"></iframe>
		</div>
		<hr class="stylehr">
		@include('home.bookcomment.bookcomment')
		<br>
	</div>
	
</div>
