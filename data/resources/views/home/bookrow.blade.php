<div class="col-md-9 right-shelf">
   <div class="row">
      @foreach($book as $row)
      <div class="col-xs-18 col-sm-6 col-md-4">
         <a href="#">
            <div class="thumbnail col-md-4">
               <a href="{{ route('home') }}/book/view/{{ $row->id }}"><img class="bookimage" data-id="{{ $row->id }}" src="{{ asset('upload/img/book') }}/{{$row->img}}" alt="" style="width:120px;height:150px;"></a>
               <div class="center-text-img" >
                  <p>Đọc Sách</p>
               </div>
            </div>
         </a>
         <div class="caption col-md-8">
            <div style="height: 80px;">
                <a href="{{ route('home') }}/book/view/{{ $row->id }}"><h1>{{$row->book_name}}</h1></a>
               <h2><a href="{{ route('home') }}/author/view/{{ $row->auth_id }}">{{$row->author->auth_name}}</a></h2>
            </div>
            <div style="height: 90px;width: 100%;">
               <p>{!! $row->book_desc !!}</p>
            </div>
         </div>
      </div>
      @endforeach
      <audio class="voice" src="" hidden autoplay></audio>
   </div>
</div>
<div class="container">
{{$book->render()}}
</div>
@if(isset($uss))
@php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://api.openfpt.vn/text2speech/v4");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "Xin chào bạn đến với thư viện điện tử dành cho người khiếm thị . Đây là giao diện bình thường, để chuyển qua giao diện dành cho người khiếm thị vui lòng nhấp vào 'Giao diện a bơ lớt' góc trên bên trái, để đăng nhập hoặc đăng ký nhấp vào ô 'Đăng nhập' bên trên góc phải. Mọi thông tin liên lạc hoặc vấn đề liên quan đến trang web vui lòng chọn mục 'Góp ý' để gửi về cho chúng  tôi. Xin cảm ơn");
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Api_key: 101fdf2c82464458ac0b963eedd6b691";
$headers[] = "Speed: -2";
$headers[] = "Voice: hatieumai";
$headers[] = "Prosody: 0";
$headers[] = "Cache-Control: no-cache";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
$json = json_decode($result, true);
@endphp
<audio src="<?php echo $json['async']; ?>" hidden autoplay></audio>
@endif