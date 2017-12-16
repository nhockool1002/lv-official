<div class="container">
	<header>
        <h1>{{ $book->book_name }}</h1>
	</header>
<hr class="stylehr">
<div class="col-md-3 info-image">
	<img src="{{ asset('upload/img/book') }}/{{$book->img}}" style="width:100%">
</div>

<div class="col-md-9 book-detail">
	<div class="col-md-12">
			<p><b>Tên phát hành:</b> <span style="font-size: 18px">{{ $book->book_name }}</span></p>
			
	</div>

	<div class="col-md-12">
			<p><b>Tác giả:</b> <span style="font-size: 18px"><a href="{{ route('home') }}/author/view/{{ $book->auth_id }}">{{ $book->author->auth_name }}</a></span></p>
	</div>

	<div class="col-md-12">
		<p><b>Danh mục: </b>
			<a href="#Tat-ca-sach-co-cung-the-loai-1" style="font-size: 18px">{{ $book->categories->cat_name }}</a>
		<p><b>Nhà xuất bản: </b>
			<a href="#Tat-ca-sach-nha-xuat-ban" style="font-size: 18px">{{ $book->publisher->pub_name }}</a></p>
		<p><b>Lần tái bản:</b> {{ $book->edition }}</p>
		<p><b>Ngôn ngữ:</b> {{ $book->language->lang_name }}</p>
		<p><b>Ngày đăng:</b> {{ $book->created_at }}</p>
		<p><b>Lượt xem:</b> Cập nhật</p>
		<p><b>Người đăng:</b> Eyes Plus</p>
		<br>
		<p>
  		<a href="{{ route('home') }}/bookread/{{$book->id}}" class="w3-btn w3-black w3-round-large">Đọc Sách</a>
  		<a href="#" class="w3-btn w3-white w3-border w3-border-blue w3-round-large">Đánh Giá</a>
		</p>
	</div>

</div>

<div class="col-md-12 long-des-contain">
	<hr class="stylehr">
	<p>{!! $book->book_desc !!}</p>
	<hr class="stylehr">

</div>
</div>
