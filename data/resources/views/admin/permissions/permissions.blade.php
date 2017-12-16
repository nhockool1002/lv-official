@extends('admin')
@section('title','Quản lý quyền hạn')
@section('h1','Quản lý quyền hạn')
@section('submenu')
	@include('admin.submenu.submenu-permission')
@endsection
@section('content')
        @if(session('success_mesage'))
				<div class="alert alert-success">
					<i class="fa fa-check" aria-hidden="true"></i> {{session('success_mesage')}}
				</div>
	@endif
		<div class="container table-responsive text-sm-center">
  <h2>Quản lý quyền hạn</h2>
  <table class="table" style="overflow-x:auto;">
    <thead>
      <tr>
        <th style="width: 30p%;">ID</th>
        <th style="width: 10p%;">Permission</th>
        <th style="width: 40p%;">Option</th>
      </tr>
    </thead>
    <tbody class='usertable'>
     @foreach($per as $row)
      <tr class="table">
       	<td style="width: 30p%;">{{$row->id}}</td>
        <td style="width: 30p%;">{{$row->per_name}}</td>
        <td style="width: 40p%;">
        <a href="{{route('permissions')}}/geteditpermission/{{$row->id}}"><i class="fa fa-cog" aria-hidden="true"></i></a></td>
      </tr>
      @endforeach()
    </tbody>
  </table>
</div>
@endsection