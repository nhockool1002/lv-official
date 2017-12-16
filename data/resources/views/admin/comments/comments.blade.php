@extends('admin')
@section('title','Quản lý bình luận')
@section('h1','Quản lý bình luận')
@section('submenu')
	@include('admin.submenu.submenu-comment')
@endsection
@section('content')
    @if(session('success_mesage'))
				<div class="alert alert-success">
					<i class="fa fa-check" aria-hidden="true"></i> {{session('success_mesage')}}
				</div>
	@endif
	<div class="container table-responsive text-sm-center">
  <h2>Quản lý bình luận</h2>
  <table class="table" style="overflow-x:auto;">
    <thead>
      <tr>
        <th style="width: 10p%;">ID</th>
        <th style="width: 10p%;">Book</th>
        <th style="width: 20p%;">User</th>
        <th style="width: 40p%;">Content</th>
        <th style="width: 20p%;">Option</th>
      </tr>
    </thead>
    <tbody class='usertable'>
     @foreach($cmt as $row)
      <tr class="table">
       	<td style="width: 10p%;">{{$row->id}}</td>
        <td style="width: 10p%;">{{$row->book->book_name}}</td>
         <td style="width:20p%;">{{$row->users->username}}</td>
        <td style="width: 40p%;">{{$row->comment_content}}</td>
        <td style="width: 20p%;">
        <a href="{{route('comments')}}/getdeletecomment/{{$row->id}}" onclick="return confirm('Are you sure?')"><i class="fa fa-user-times" aria-hidden="true"></i></a></td>
      </tr>
      @endforeach()
    </tbody>
  </table>
</div>	
<center>
<div class="paginatebar" style="width:100%;text-align:center;">
<div class="container">
{{$cmt->render()}}
</div>
</div>
</center>
@endsection