@extends('admin')
@section('title','Quản lý sách')
@section('h1','Quản lý sách')
@section('submenu')
	@include('admin.submenu.submenu-book')
@endsection
@section('content')
	@if(session('success_mesage'))
				<div class="alert alert-success">
					<i class="fa fa-check" aria-hidden="true"></i> {{session('success_mesage')}}
				</div>
	@endif
	<div class="container table-responsive text-sm-center">
  <h2>Danh sách Sách</h2>
  <table class="table" style="overflow-x:auto;">
    <thead>
      <tr>
        <th style="width: 20p%;">Tên sách</th>
        <th style="width: 10p%;">Bản quyền</th>
        <th style="width: 50p%;">Mô tả</th>
        <th style="width: 10p%;">Option</th>
      </tr>
    </thead>
    <tbody class='usertable'>
     @foreach($book as $row)
      <tr class="table">
		  <td style="width: 20%;"><b>{{$row->book_name}}</b></td>
        <td style="width: 10%;"><img src="../upload/img/book/{{$row->img}}" width="30px"></td>
        <td style="width: 50%;">{{$row->book_desc}}</td>
        <td style="width: 10%;"><a href="{{route('books')}}/geteditbook/{{$row->id}}"><i class="fa fa-cog" aria-hidden="true"></i></a>
			<a href="{{route('books')}}/getdeletebook/{{$row->id}}" onclick="return confirm('Are you sure?')"><i class="fa fa-user-times" aria-hidden="true"></i></a></td>
      </tr>
      @endforeach()
    </tbody>
  </table>
</div>	
<center>
<div class="paginatebar" style="width:100%;text-align:center;">
<div class="container">
{{$book->render()}}
</div>
</div>
</center>
@endsection