@extends('admin')
@section('title','Thêm thành viên mới')
@section('h1','Thêm thành viên mới')
@section('submenu')
	@include('admin.submenu.submenu-users')
@endsection
@section('content')
	<div class="form-control">
		<form action="{{route('postaddUser')}}" method="post">
            {{ csrf_field() }}
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
		<label for="username" class="">Username :</label>
		<input type="text" class="form-control" name="username" />
		<label for="password" class="">Password :</label>
		<input type="password" class="form-control" name="password" />
		<label for="phone" class="">Phone :</label>
		<input type="text" class="form-control" name="phone" />
		<label for="email" class="">Email :</label>
		<input type="text" class="form-control" name="email" />
		<label for="permission" class="">Permissions :</label>
		<select name="permission" class="form-control">
            @foreach($per as $row)
			<option value="{{$row->id}}">{{$row->per_name}}</option>
            @endforeach
		</select>
		<br />
		<div class="text-sm-center">
		<button type="reset" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reset</button>
		<button type="submit" class="btn btn-success"><i class="fa fa-telegram" aria-hidden="true"></i> Xác nhận</button>
		</div>
		</form>
	</div>
@endsection