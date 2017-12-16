@extends('admin')
@section('title','Sửa danh mục')
@section('h1','Sửa danh mục')
@section('submenu')
	@include('admin.submenu.submenu-categories')
@endsection
@section('content')
<h2>Sửa danh mục <b><font color="red">[{{$cat->cat_name}}]</font></b></h2>
	<div class="form-control">
		<form method="post" action="{{route('categories')}}/posteditcat/{{$cat->id}}">
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
			<label for="catname" class="">Tên danh mục :</label>
			<input type="text" class="form-control" name="catname" value="{{$cat->cat_name}}"/><br>
			<label for="parent" class="">Thư mục gốc :</label>
			<select name="parentid" class="form-control">
					<option value="0" >Không</option>
					@foreach($pcat as $row)
					<option value="{{$row->id}}" @if($row->id == $cat->parent_id) selected='selected' @endif >{{$row->cat_name}}</option>
				@endforeach
			</select><br>
			<label for="desc" class="">Mô tả :</label>
			<textarea name="desc" id="" cols="30" rows="10" class="form-control">{{$cat->cat_desc}}</textarea>
			<br />
			<div class="text-sm-center">
			<button type="reset" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reset</button>
			<button type="submit" class="btn btn-success"><i class="fa fa-telegram" aria-hidden="true"></i> Xác nhận</button>
			</div>
		</form>
	</div>
@endsection