@extends('admin')
@section('title','Thêm quyền hạn')
@section('h1','Thêm quyền hạn')
@section('submenu')
	@include('admin.submenu.submenu-permission')
@endsection
@section('content')
	<div class="form-control">
		<form method="post" action="{{ route('permissions') }}/postaddpermission" enctype="multipart/form-data">
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
			<label for="" class="">Tên quyền hạn :</label>
			<input type="text" class="form-control" name="pername" /><br>

            <label for="" class="">Màu :</label>
			<input type="color" name="percolor" /><br>
			
			<label for="" class="">Icon :</label>
			<input type="file" class="form-control" name="pericon" /><br>
			
			<label for="catname" class="">Style : (Chỉ bao gồm thuộc tính CSS, cách nhau bằng ;)</label>
			<input type="text" class="form-control" name="perstyle" placeholder="font-weight:bolder;text-transform:uppercase;" /><br>
			<div class="text-sm-center">
			<button type="reset" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reset</button>
			<button type="submit" class="btn btn-success"><i class="fa fa-telegram" aria-hidden="true"></i> Xác nhận</button>
			</div>
		</form>
	</div>
@endsection