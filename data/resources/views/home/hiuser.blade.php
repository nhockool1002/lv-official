@if(isset($us))
<div class="col-md-12 user-info">
      <p>Chào <img src="{{ asset('lib/img') }}/{{$us->permission->per_icon}}" alt=""><span style="{{$us->permission->per_style}}color:{{$us->permission->per_color}};"> {{$us->username}}</span> </p>
      <p>Chức vụ: <span style="{{$us->permission->per_style}}color:{{$us->permission->per_color}};">{{ $us->permission->per_name}}</span></p>
      <hr class="style3">
      @if ($us->per_id  == 4)
      <p><a href="{{ route('home')}}/admin"><i class="fa fa-cogs"></i> Admin Control Panel</a></p>
      @endif
      <p><a href=""><i class="fa fa-cogs"></i> Điều chỉnh tài khoản</a></p>
      <p><a href=""><i class="fa fa-group"></i> Quản lý bạn bè</a></p>
      <hr class="style3">
</div>
@else
<div class="col-md-12 user-info">
      <p>Chào bạn</p>
      <p>Bạn đã đăng ký tài khoản chưa ?</p>
      <a href="{{ route('signin') }}"><button type="button" class="btn btn-default">Đăng nhập</button></a> <a href=""><button type="button" class="btn btn-default">Đăng ký</button></a>
      <hr class="style3">
</div>
@endif