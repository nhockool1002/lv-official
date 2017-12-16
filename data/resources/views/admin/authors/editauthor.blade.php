@extends('admin')
@section('title','Sửa tác giả')
@section('h1','Sửa tác giả')
@section('submenu')
	@include('admin.submenu.submenu-author')
@endsection
@section('content')
<h2>Sửa tác giả <b><font color="red">[{{$auth->auth_name}}]</font></b></h2>
	<div class="form-control">
		<form method="post" action="{{route('authors')}}/posteditauthor/{{$auth->id}}" enctype="multipart/form-data">
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
		<label for="auth_name" class="">Tên tác giả :</label>
		<input type="text" class="form-control" name="auth_name" value="{{$auth->auth_name}}" /><br>
		<label for="auth_nickname" class="">Nickname :</label>
		<input type="text" class="form-control" name="auth_nickname" value="{{$auth->auth_nickname}}" /><br>
		<br />
		<label for="auth_email" class="">Email :</label>
		<input type="email" class="form-control" name="auth_email" value="{{$auth->auth_email}}" /><br>
		<br />
		<label for="username" class="">Hình ảnh :</label>
		<input type="file" class="form-control" name="authimg" /><br>
		<img src="/../lv/upload/img/author/{{$auth->img}}" width='60px' /><br/><br>
		<br />
		<label for="date_of_death" class="">Trích dẫn :</label>
		<input type="text" class="form-control" name="quote"  value="{{$auth->quote}}" /><br>
		<br />
		<label for="date_of_death" class="">Tiểu sử :</label>
		<textarea name="story" id="" class="form-control">{{$auth->story}}</textarea><br>
		<br />
		<label for="date_of_death" class="">Chiều cao :</label>
		<input type="text" class="form-control" name="height" placeholder="175" value="{{$auth->height}}" />(cm)<br>
		<br />
		<label for="date_of_death" class="">Cân nặng :</label>
		<input type="text" class="form-control" name="weight" placeholder="68" value="{{$auth->weight}}" />(kg)<br>
		<br />
		<label for="date_of_birth" class="">Ngày sinh :</label>
		<input type="date" class="form-control" name="date_of_birth" value="{{$auth->date_of_birth}}"/><br>
		<br />
		<label for="date_of_death" class="">Ngày mất :</label>
		<input type="date" class="form-control" name="date_of_death" value="{{$auth->date_of_death}}" /><br>
		<br />
		<div class="text-sm-center">
            <button type="reset" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reset</button>
		<button type="submit" class="btn btn-success"><i class="fa fa-telegram" aria-hidden="true"></i> Sửa tác giả</button>
		</div>
		</form>
	</div>
@endsection