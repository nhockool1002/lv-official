@extends('admin')
@section('title','Thêm sách mới')
@section('h1','Thêm sách mới')
@section('submenu')
	@include('admin.submenu.submenu-book')
@endsection
@section('content')
	<div class="form-control">
		<form action="{{route('postaddBook')}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					<i class="fa fa-times" aria-hidden="true"></i> {{$err}}<br>
					@endforeach
				</div>
		@endif
		@if(session('success_mesage'))
				<div class="alert alert-success">
					<i class="fa fa-check" aria-hidden="true"></i> {{session('success_mesage')}}
				</div>
		@endif
		<label for="book_name" class="">Tên sách :</label>
		<input type="text" class="form-control" name="book_name" /><br>
		<label for="book_desc" class="">Mô tả :</label>
		<textarea name="book_desc" id="" cols="30" rows="10" class="form-control editor"></textarea>
		<br />
		<label for="cat_id" class="">Danh mục:<a href="../categories/addcat">[Thêm danh mục]</a></label>
		<select name="cat_id" class="form-control">
		{{ menuParent($cat,0,'') }}
		</select><br>
		<label for="pub_id" class="">Nhà xuất bản:</label>
		<select name="pub_id" class="form-control">
		@foreach($pub as $row)
			<option value="{{$row->id}}">{{$row->pub_name}}</option>
		@endforeach
		</select><br>
		<label for="lang_id" class="">Ngôn ngữ:</label>
		<select name="lang_id" class="form-control">
		@foreach($lang as $row)
			<option value="{{$row->id}}">{{$row->lang_name}}</option>
		@endforeach
		</select><br>
		<label for="auth_id" class="">Tác giả: <a href="../authors/addauthor">[Thêm tác giả]</a></label>
		<select name="auth_id" class="form-control">
		@foreach($auth as $row)
			<option value="{{$row->id}}">{{$row->auth_name}}</option>
		@endforeach
		</select><br>
		<label for="edition" class="">Tái bản :</label>
		<input type="text" class="form-control" name="edition" /><br>
		<label for="username" class="">Hình ảnh :</label>
		<input type="file" class="form-control" name="filesTest" /><br>
		<label for="username" class="">File tài liệu :</label>
		<input type="file" class="form-control" name="filesDoc" /><br>
		<label for="book_name" class="">Liên kết tải :</label>
		<input type="text" class="form-control" name="url" /><br>
		<label for="username" class="">Bản quyền:</label>
		<select name="credits" class="form-control">
			<option value="0">0</option>
			<option value="1">1</option>
		</select><br>
		<label for="username" class="">Nổi bật:</label>
		<select name="specially" class="form-control">
			<option value="0">0</option>
			<option value="1">1</option>
		</select><br>
		<div class="text-sm-center">
		<button type="reset" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reset</button>
		<button type="submit" class="btn btn-success"><i class="fa fa-telegram" aria-hidden="true"></i> Xác nhận</button>
		</div>
		</form>
	</div>
@endsection