@extends('admin')
@section('title','Quản lý danh mục')
@section('h1','Quản lý danh mục')
@section('submenu')
	@include('admin.submenu.submenu-categories')
@endsection

	@section('content')
	@if(session('success_mesage'))
				<div class="alert alert-success">
					<i class="fa fa-check" aria-hidden="true"></i> {{session('success_mesage')}}
				</div>
	@endif
	<div class="container table-responsive text-sm-center">
  <h2>Danh sách danh mục</h2>
  <table class="table" style="overflow-x:auto;">
    <thead>
      <tr>
        <th style="width: 10p%;">ID</th>
        <th style="width: 10p%;">Danh mục</th>
        <th style="width: 30p%;">Slug</th>
        <th style="width: 40p%;">Option</th>
      </tr>
    </thead>
    <tbody class='usertable'>
     @foreach($cat as $row)
      <tr class="table">
       	<td style="width: 10p%;">{{$row->id}}</td>
        <td style="width: 10p%;">{{$row->cat_name}}</td>
        <td style="width: 30p%;">{{$row->cat_name_slug}}</td>
        <td style="width: 40p%;"><i class="fa fa-cog" aria-hidden="true"></i>
        <i class="fa fa-user-times" aria-hidden="true"></i></td>
      </tr>
      @endforeach()
    </tbody>
  </table>
<center>
<div class="paginatebar" style="width:100%;text-align:center;">
<div class="container">
{{$cat->render()}}
</div>
</div>
</center>
@endsection