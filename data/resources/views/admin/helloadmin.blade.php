<div class="clearboth"></div>
	<div class="helloadmin col-sm-12">
        <span>Xin chào, </span> @if(isset($us)) <img src="{{ asset('lib/img') }}/{{$us->permission->per_icon}}" alt=""><span style="{{$us->permission->per_style}}color:{{$us->permission->per_color}};"> {{$us->username}}</span> @endif
		<a href="{{ route('users') }}/getedituser/{{$us->id}}">[Sửa]</a><a href="{{ route('getlogoutAdmin') }}">[Thoát]</a><br>
		<span><b>Đăng nhập lần cuối :</b></span> Ngày <span style="color:red;font-weight:bolder;">{{ Carbon\Carbon::parse($us->lastlogin)->format('d') }}</span> tháng <span style="color:red;font-weight:bolder;">{{ Carbon\Carbon::parse($us->lastlogin)->format('m') }}</span> năm <span style="color:red;font-weight:bolder;">{{ Carbon\Carbon::parse($us->lastlogin)->format('Y') }}</span> lúc <span style="color:red;font-weight:bolder;">{{ Carbon\Carbon::parse($us->lastlogin)->format('H:i') }}.</span>
	</div> 
	<div class="clearboth"></div>