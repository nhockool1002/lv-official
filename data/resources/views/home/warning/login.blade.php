@extends('home')
@section('content')
<div class="container">
   <div class="row" style="width:500px;margin: 0 auto">
    <form action="{{ route('postdangnhapUser') }}" method="post">
       {{csrf_field()}}
         @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					<i class="fa fa-times" aria-hidden="true"></i> {{$err}}<br>
					@endforeach
				</div>
		@endif
		@if(session('success_mesage'))
				<div class="alert alert-warning">
					<i class="fa fa-check" aria-hidden="true"></i> {{session('success_mesage')}}
				</div>
		@endif
        <label for="">Username :</label>
        <input type="text" class="form-control" name="username">
        <label for="">Password :</label>
        <input type="password" class="form-control" name="password">
        <br>
        <button type="submit" class="btn btn-danger">Đăng nhập lại</button>
        <button type="button" class="btn btn-warning"> Hổ trợ</button>
    </form>
   </div>
</div>
@endsection