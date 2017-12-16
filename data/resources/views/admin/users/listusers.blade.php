@extends('admin')
@section('title','Danh sách thành viên')
@section('h1','Danh sách thành viên')
@section('submenu')
	@include('admin.submenu.submenu-users')
@endsection
@section('content')
	<div class="container table-responsive text-sm-center">
        	@if(session('success_mesage'))
				<div class="alert alert-success">
					<i class="fa fa-check" aria-hidden="true"></i> {{session('success_mesage')}}
				</div>
	       @endif
  <h2>Danh sách thành viên</h2>
  <table class="table" style="overflow-x:auto;">
    <thead>
      <tr>
        <th style="width: 10p%;">ID</th>
        <th style="width: 10p%;">Username</th>
        <th style="width: 30p%;">Email</th>
        <th style="width: 40p%;">Option</th>
      </tr>
    </thead>
    <tbody class='usertable'>
     @foreach($users as $row)
      <tr class="table">
       	<td style="width: 10p%;">{{$row->id}}</td>
        <td style="width: 10p%;">{{$row->username}}</td>
        <td style="width: 30p%;">{{$row->email}}</td>
        <td style="width: 40p%;"><a href="{{ route('users')}}/getedituser/{{ $row->id }}"><i class="fa fa-cog" aria-hidden="true"></i></a>
        <a href="{{route('users')}}/getdeleteuser/{{$row->id}}" onclick="return confirm('Are you sure?')"><i class="fa fa-user-times" aria-hidden="true"></i></a> <i class="fa fa-lock" aria-hidden="true" type="button" data-toggle="modal" data-target="#myModal{{ $row->id }}"></i></td>
      </tr>
      
        
         <!-- Modal -->
  <div class="modal fade" id="myModal{{ $row->id }}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
        <form method="post" action="{{ route('users') }}/postbanneduser/{{ $row->id }}">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Khóa thành viên</h4>
        </div>
        <div class="modal-body" style="text-align:left;">
            {{ csrf_field() }}
            <div class="radio">
            <label><input type="radio" name="optradio" id="khoavv" class="khoavv" checked='checked' value="1" > Khóa vĩnh viễn</label>
            </div>
            <div class="radio">
            <label><input type="radio" name="optradio" id="khoaex" class="khoaex" value="0" > Khóa có thời hạn</label>
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
        
      @endforeach()
        </tbody>
        </table>
	
<center>
<div class="paginatebar" style="width:100%;text-align:center;">
<div class="container">
{{$users->render()}}
</div>
</div>
</center>
@endsection