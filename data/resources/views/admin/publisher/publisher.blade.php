@extends('admin')
@section('title','Danh sách nhà xuất bản')
@section('h1','Danh sách nhà xuất bản')
@section('submenu')
	@include('admin.submenu.submenu-publisher')
@endsection
@section('content')
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
        <td style=""><i class="fa fa-cog" aria-hidden="true"></i>
        <i class="fa fa-user-times" aria-hidden="true"></i></td>
      </tr>
      @endforeach()
    </tbody>
  </table>
</div>	
<div class="container">
								<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
</div>
@endsection