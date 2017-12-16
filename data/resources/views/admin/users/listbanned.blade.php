@extends('admin')
@section('title','Danh sách vi phạm')
@section('h1','Danh sách vi phạm')
@section('submenu')
	@include('admin.submenu.submenu-users')
@endsection
@section('content')
       	@if(session('success_mesage'))
				<div class="alert alert-success">
					<i class="fa fa-check" aria-hidden="true"></i> {{session('success_mesage')}}
				</div>
	       @endif
	<div class="container table-responsive text-sm-center">

  <h2>Danh sách thành viên vi phạm</h2>
  <table class="table" style="overflow-x:auto;">
    <thead>
      <tr>
        <th style="width: 10p%;">ID</th>
        <th style="width: 10p%;">Username</th>
        <th style="width: 30p%;">Expire</th>
        <th style="width: 20p%;">Reason</th>
        <th style="width: 30p%;">Times</th>
        <th style="width: 20p%;">Option</th>
      </tr>
    </thead>
    <tbody class='usertable'>
     @foreach($ban as $row)
      <tr class="table">
       	<td style="width: 10p%;">{{$row->user->id}}</td>
        <td style="width: 10p%;">{{$row->user->username}}</td>
        <td style="width: 30p%;">{{$row->expire}}</td>
        <td style="width: 30p%;">{{$row->reason}}</td>
        <td style="width: 30p%;">{{$row->times}}</td>  
        <td style="width: 40p%;"><i class="fa fa-unlock" aria-hidden="true" type="button" data-toggle="modal" data-target="#myModal{{$row->user->id}}"></i></td>
      </tr>
       
        
        <!-- Modal -->
  <div class="modal fade" id="myModal{{$row->user->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
        <form method="post" action="{{ route('users') }}/postunbanned/{{ $row->user->id }}">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mở khóa thành viên</h4>
        </div>
        <div class="modal-body" style="text-align:left;">
            {{ csrf_field() }}
            <p>Thành viên <b><font color="red">{{$row->user->username}}</font></b> bị cấm đến <b>{{$row->expire}} <font color="blue">({{ secintoday(stringtotime($row->expire)) }})</font></b>, lý do vi phạm cuối cùng là <b><font color="green">{{$row->reason}}</font></b>.</p>
            <p>Tổng số lần vi phạm là <b><font color="orange">{{$row->times}}</font></b> lần</p>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-warning"><i class="fa fa-unlock" aria-hidden="true"></i> Mở khóa</button>
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
</div>
</div>
</center>
@endsection