<div class="comment-zone">
<div class="container">
    <div class="row">
        <div class="col-sm-6">
           <div class="comment-zone-list">
               <ul>
                    <a name="newcomment"></a>
                    @foreach($cmt as $row)
                   <li>
                      <div class="cmtbox">
                          <div class="cmtbox-img">
                                <img src="http://localhost/lv/lib/img/avatar.jpg" alt="" style="width:50px; height:50px;">
                          </div>
                          <div class="cmtbox-info">
                            <p class="cmtbox-username">
                            @if($row->users->per_id == 4)
                            <span style="color:#f53810;font-weight:bolder;">
                            {{$row->users->username}}</span>
                            @elseif($row->users->per_id == 3)
                            <span style="color:#0477fc;font-weight:bolder;">
                            {{$row->users->username}}</span>
                            @elseif($row->users->per_id == 2)
                            <span style="color:#458b2d;font-weight:bolder;">
                            {{$row->users->username}}</span>
                            @elseif($row->users->per_id == 5)
                            <span style="color:#000;font-weight:bolder;text-decoration:line-through;">
                            {{$row->users->username}}</span>
                            @else
                            {{$row->users->username}}
                            @endif
                            </p>
                            <p class="cmtbox-content">{{$row->comment_content}} <span class="voice-comment" data-id="{{$row->id}}" style="color:blue;font-size:18px;"><i class="fa fa-bullhorn" aria-hidden="true"></i></span></p>
                          </div>
                    </div>
                   </li>
                   <div style="height:10px"></div>
                   @endforeach
                   <audio class="voice" src="" hidden autoplay></audio>
                   {{$cmt->render()}}
               </ul>
           </div>
           <br>
           <div class="cmtbox-form">
           <h1 class='comment-zone-title'><i class="fa fa-comment" aria-hidden="true"></i> Viết bình luận ...</h1>
            <form action="{{ route('home') }}/book/comment/{{$book->id}}" method="post">
               {{csrf_field()}}
		@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					<i class="fa fa-times" aria-hidden="true"></i> {{$err}}<br>
					@endforeach
				</div>
		@endif
		@if(session('success_mesage'))
				<div class="alert alert-success">
					<i class="fa fa-check" aria-hidden="true"></i> {{session('success_mesage')}}
				</div>
		@endif
                <div class="comment-zone-textarea">
                <textarea class="form-control" name="content" id="" placeholder="Nhập bình luận bạn ở đây ..." @if(!isset($us)) disabled @endif ></textarea>
                <input type="text" name="ip" hidden="hidden" value="{{getUserIP()}}">
                <input type="text" name="agent" hidden="hidden" value="<?php echo $_SERVER['HTTP_USER_AGENT']; ?>">
                <div style="height:10px"></div>
                <div class="comment-zone-submit">
                <span class="cmtbox-notice">@if(!isset($us)) (*)Chức năng đăng nhập chỉ dành cho thành viên @endif @if(isset($us)) (*)Vui lòng comment có ý thức và tôn trọng người khác @endif</span><button type="submit" class="btn btn-success" @if(!isset($us)) disabled @endif>Gửi</button>
                </div>
                </div>
            </form>
            </div>
        </div>
        <div class="col-sm-6">
            FACEBOOK COMMENT
        </div>
    </div>
</div>
</div>


