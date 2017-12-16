<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a href="{!! asset('/admin') !!}"><div class="system-item"><i class="fa fa-cog" aria-hidden="true"></i> Tổng thể</div></a>
		<a href="{{ route('users') }}"><div class="system-item"><i class="fa fa-user" aria-hidden="true"></i> Người dùng</div></a>
		<a href="{{ route('categories') }}"><div class="system-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Danh mục</div></a>
		<a href="{{ route('books') }}"><div class="system-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sách</div></a>
		<a href="{{ route('authors') }}"><div class="system-item"><i class="fa fa-child" aria-hidden="true"></i> Tác giả</div></a>
		<a href="{{ route('publisher') }}"><div class="system-item"><i class="fa fa-bookmark" aria-hidden="true"></i> Nhà xuất bản</div></a>
		<a href="{{ route('comments') }}"><div class="system-item"><i class="fa fa-commenting-o" aria-hidden="true"></i> Bình luận</div></a>
		<a href="{{ route('permissions') }}"><div class="system-item"><i class="fa fa-globe" aria-hidden="true"></i> Quyền hạn</div></a>
	</div>