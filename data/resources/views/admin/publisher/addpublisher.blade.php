@extends('admin')
@section('title','Thêm nhà xuất bản')
@section('h1','Thêm nhà xuất bản')
@section('submenu')
	@include('admin.submenu.submenu-publisher')
@endsection
@section('content')
	<div class="form-control">
		<form method="post" action="{{ route('publisher') }}/postaddpublisher">
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
			<label for="catname" class="">Tên nhà xuất bản :</label>
			<input type="text" class="form-control" name="pubname" /><br>

            <label for="catname" class="">Email :</label>
			<input type="text" class="form-control" name="pubemail" /><br>
			
			<label for="catname" class="">Phone :</label>
			<input type="text" class="form-control" name="pubphone" /><br>
			<div class="text-sm-center">
			<button type="reset" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reset</button>
			<button type="submit" class="btn btn-success"><i class="fa fa-telegram" aria-hidden="true"></i> Xác nhận</button>
			</div>
		</form>
	</div>
@endsection