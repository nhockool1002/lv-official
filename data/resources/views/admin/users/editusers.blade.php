@extends('admin')
@section('title','Sửa thành viên')
@section('h1','Sửa thành viên')
@section('submenu')
	@include('admin.submenu.submenu-users')
@endsection
@section('content')
	<div class="form-control">
		<form action="{{route('users')}}/postedituser/{{$user->id}}" method="post">
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
		<input type="text" class="form-control" name="username" value="{{ $user->username }}"/>
		<label for="password" class="">Password :</label>
		<input type="password" class="form-control" name="password"/>
		<label for="phone" class="">Phone :</label>
		<input type="text" class="form-control" name="phone" value="0{{ $user->phone }}" />
		<label for="email" class="">Email :</label>
		<input type="text" class="form-control" name="email" value="{{ $user->email }}"/>
		<label for="permission" class="">Permissions :</label>
		<select name="permission" class="form-control">
            @foreach($per as $row)
			<option value="{{$row->id}}" @if($row->id == $user->per_id) selected='selected' @endif >{{$row->per_name}}</option>
            @endforeach
		</select>
		<br />
		<div class="text-sm-center">
		<button type="reset" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reset</button>
		<button type="submit" class="btn btn-success"><i class="fa fa-telegram" aria-hidden="true"></i> Xác nhận</button>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="fa fa-window-close" aria-hidden="true"></i> Khóa</button>
		</div>
		</form>
        
                    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
        <form method="post" action="{{ route('users') }}/postbanneduser/{{ $user->id }}">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Khóa thành viên</h4>
        </div>
        <div class="modal-body" style="text-align:left;">
            {{ csrf_field() }}
            <div class="radio">
            <label><input type="radio" name="optradio" id="khoavv" checked='checked' value="1" > Khóa vĩnh viễn</label>
            </div>
            <div class="radio">
            <label><input type="radio" name="optradio" id="khoaex" value="0" > Khóa có thời hạn</label>
            </div>
            <div class="choosen" style="display:none;">
            <div class="radio">
            <label><input type="radio" name="choose" checked='checked' value="0"> Khóa 3 ngày</label>
            </div>
            <div class="radio">
            <label><input type="radio" name="choose" value="1"> Khóa 7 ngày</label>
            </div>
            <div class="radio">
            <label><input type="radio" name="choose" value="2"> Khóa 30 ngày</label>
            </div>
            </div>
            <label>Lý do :</label>
            <input type="text" name="reason" />
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="fa fa-telegram" aria-hidden="true"></i> Xác nhận</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
	</div>
@endsection