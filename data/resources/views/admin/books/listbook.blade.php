@extends('admin')
@section('title','Quản lý sách')
@section('h1','Quản lý sách')
@section('submenu')
	@include('admin.submenu.submenu-book')
@endsection
@section('content')
	<div class="container table-responsive text-sm-center">
  <h2>Danh sách Sách</h2>
  <table class="table" style="overflow-x:auto;">
    <thead>
      <tr>
        <th style="width: 10p%;">Tên sách</th>
        <th style="width: 10p%;">Bản quyền</th>
        <th style="width: 30p%;">Mô tả</th>
        <th style="width: 40p%;">Option</th>
      </tr>
    </thead>
    <tbody class='usertable'>
     @foreach($book as $row)
      <tr class="table">
		  <td style="width: 10%;font-weight:bolder;">{{$row->{{$row->book_name}}</td>
        <td style="width: 10%;">{{$row->img}}</td>
        <td style="width: 30%;">{!! $row->book_desc !!}</td>
        <td style="width: 40%;"><i class="fa fa-cog" aria-hidden="true"></i>
        <i class="fa fa-user-times" aria-hidden="true"></i></td>
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