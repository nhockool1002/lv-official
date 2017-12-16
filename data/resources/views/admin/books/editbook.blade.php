@extends('admin')
@section('title','Sửa sách')
@section('h1','Sửa sách')
@section('submenu')
	@include('admin.submenu.submenu-book')
@endsection
@section('content')
	<div class="form-control">
		<form action="{{route('books')}}/posteditbook/{{$book->id}}" method="post" enctype="multipart/form-data">
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
		<input type="text" class="form-control" name="book_name" value="{{$book->book_name}}" /><br>
		<label for="book_desc" class="">Mô tả :</label>
		<textarea name="book_desc" id="" cols="30" rows="10" class="form-control editor">{{$book->book_desc}}</textarea>
		<br />
		<label for="cat_id" class="">Danh mục:</label>
		<select name="cat_id" class="form-control">
		{{ menuParentedit($cat, 0, '', $book) }}
		</select><br>
		<label for="lang_id" class="">Ngôn ngữ:</label>
		<select name="lang_id" class="form-control">
		@foreach($lang as $row)
			<option value="{{$row->id}}" @if($row->id == $book->lang_id) selected='selected' @endif >{{$row->lang_name}}</option>
		@endforeach
		</select><br>
		<label for="pub_id" class="">Nhà xuất bản:</label>
		<select name="pub_id" class="form-control">
		@foreach($pub as $row)
			<option value="{{$row->id}}" @if($row->id == $book->pub_id) selected='selected' @endif >{{$row->pub_name}}</option>
		@endforeach
		</select><br>
		<label for="auth_id" class="">Tác giả:</label>
		<select name="auth_id" class="form-control">
		@foreach($auth as $row)
			<option value="{{$row->id}}" @if($row->id == $book->auth_id) selected='selected' @endif >{{$row->auth_name}}</option>
		@endforeach
		</select><br>
		<label for="edition" class="">Tái bản :</label>
		<input type="text" class="form-control" name="edition" value="{{$book->edition}}" /><br>
		<label for="username" class="">Hình ảnh :</label>
		<img src="/../lv/upload/img/book/{{$book->img}}" width='60px' /><br/><br>
		<label for="username" class="">Upload hình khác :</label>
		<input type="file" class="form-control" name="filesTest"/><br>
		<label for="username" class="">File tài liệu :</label><br>
		<h3><span class="badge badge-danger">{{ $book->filename}}</span></h3><br>
		<label for="username" class="">Upload file khác :</label>
		<input type="file" class="form-control" name="filesDoc"/><br>
		<label for="book_name" class="">Liên kết tải :</label>
		<input type="text" class="form-control" name="url" value="{{$book->url}}" /><br>
		<label for="username" class="">Bản quyền:</label>
		<select name="credits" class="form-control">
			<option value="0" @if($book->credits == 0) selected='selected' @endif >0</option>
			<option value="1"@if($book->credits == 1) selected='selected' @endif >1</option>
		</select><br>
		<label for="username" class="">Nổi bật:</label>
		<select name="specially" class="form-control">
			<option value="0" @if($book->specially == 0) selected='selected' @endif >0</option>
			<option value="1"@if($book->specially == 1) selected='selected' @endif >1</option>
		</select><br>
		<div class="text-sm-center">
		
		<div class="container">
          <label for="" class="" style="font-weight:bolder;color:red;text-transform:uppercase">Bình luận</label>
		      <table class="table" style="overflow-x:auto;">
    <thead>
      <tr>
        <th style="width: 10p%;">ID</th>
        <th style="width: 20p%;">User</th>
        <th style="width: 30p%;">Nội dung</th>
        <th style="width: 20p%;">Ngày</th>
        <th style="width: 20p%;">Option</th>
      </tr>
    </thead>
    <tbody class='usertable'>
     @foreach($book->comment as $cmt)
      <tr class="table">
		  <td style="font-weight:bolder;">{{$cmt->id}}</td>
        <td style="">{{$cmt->users->username}}</td>
        <td style="">{!! $cmt->comment_content !!}</td>
        <td style="">{!! $cmt->created_at !!}</td>
        <td style=""><a href="{{ route('comments') }}/xoacomment/{{$cmt->id}}/{{$book->id}}" onclick="return confirm('Are you sure?')"><i class="fa fa-times" aria-hidden="true"></i></a></td>
      </tr>
      @endforeach()
    </tbody>
  </table>    
		</div>
		<button type="reset" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reset</button>
		<button type="submit" class="btn btn-success"><i class="fa fa-telegram" aria-hidden="true"></i> Xác nhận</button>
		</div>
		</form>
	</div>
@endsection