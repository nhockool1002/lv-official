@extends('admin')
@section('title','Danh sách nhà xuất bản')
@section('h1','Danh sách nhà xuất bản')
@section('submenu')
	@include('admin.submenu.submenu-publisher')
@endsection
@section('content')
    @if(session('success_mesage'))
				<div class="alert alert-success">
					<i class="fa fa-check" aria-hidden="true"></i> {{session('success_mesage')}}
				</div>
	@endif
		<div class="container table-responsive text-sm-center">
  <h2>Danh sách nhà xuất bản</h2>
  <table class="table" style="overflow-x:auto;">
    <thead>
      <tr>
        <th style="width: 10p%;">ID</th>
        <th style="width: 20p%;">Tên</th>
        <th style="width: 30p%;">Email</th>
        <th style="width: 20p%;">Số điện thoại</th>
        <th style="width: 20p%;">Option</th>
      </tr>
    </thead>
    <tbody class='usertable'>
     @foreach($pub as $row)
      <tr class="table">
       	<td style="">{{$row->id}}</td>
        <td style="">{{$row->pub_name}}</td>
        <td style="">{{$row->pub_email}}</td>
        <td style="">{{$row->phone}}</td>
        <td style=""><a href="{{route('publisher')}}/geteditpublisher/{{$row->id}}"><i class="fa fa-cog" aria-hidden="true"></i></a>
        <a href="{{route('publisher')}}/getdeletepublisher/{{$row->id}}" onclick="return confirm('Are you sure?')"><i class="fa fa-user-times" aria-hidden="true"></i></a></td>
      </tr>
      @endforeach()
    </tbody>
  </table>
</div>	
<center>
<div class="paginatebar" style="width:100%;text-align:center;">
<div class="container">
{{$pub->render()}}
</div>
</div>
</center>
@endsection