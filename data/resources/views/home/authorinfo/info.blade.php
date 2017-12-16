
<div class="container" style="padding-top: 40px;">
    <div class="row" style="background-color:black;padding-bottom:50px;">
        <div class="col-sm-3" style="text-align: center;">
            <img src="https://avatarfiles.alphacoders.com/670/67079.jpg" alt="" style="width:250px;height:250px;margin-top:30%;border: 0.060em solid #313131;border-radius: 30px;">
        </div>
        <div class="col-sm-3">
            <div style="margin-top:30%;"></div>
            <p class="authorname">{{$au->auth_name}}</p>
            <p class="authornickname">{{$au->auth_nickname}}</p>
            <br>
            <div class="infozone">
               <ul>
                <li><span class="listinfo">Ngày sinh:</span>{{ $au->date_of_birth }}</li>
                <li><span class="listinfo">Quốc gia:</span>Chưa có thông tin</li>
                <li><span class="listinfo">Chiều cao:</span>{{ $au->height }} cm</li>
                <li><span class="listinfo">Cân nặng:</span>{{ $au->weight }} kg</li>
                <li><span class="listinfo">Ngôn ngữ:</span>Tiếng Việt</li>
                <li><span class="listinfo">Email:</span>{{$au->auth_email}}</li>
            </ul>
            </div>
            <br>
            <div class="infoquotezone">
            <p class="infoquote">Trích dẫn</p>
            <span class="quotecontent">"{{ $au->quote }}"</span>
            </div>
        </div>
        <div class="col-sm-3">
            <div style="margin-top:30%;"></div>
            <div class="infolifezone">
            <p class="infolife">Tiểu sử</p>
            <div class="storycontent">{{ $au->story }}</div>
            </div>
            
        </div>
        <div class="col-sm-3">
           <div style="margin-top:30%;"></div>
           <div class="info-rl">
            <p class="infotit-rl">Một số sách</p>
            <br>
            <div class="col-sm-6 col-md-6 col-xs-6 book-rl">
                <div class="images-rl"><img src="http://localhost/lv/upload/img/book/A6pvllvp6A.jpg" alt="" style="width:120px;height:150px;"></div>
                <div class="name-rl">Ký sự Code dạo</div>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-6 book-rl">
                <div class="images-rl"><img src="http://localhost/lv/upload/img/book/A6pvllvp6A.jpg" alt="" style="width:120px;height:150px;"></div>
                <div class="name-rl">Ký sự Code dạo</div>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-6 book-rl">
                <div class="images-rl"><img src="http://localhost/lv/upload/img/book/A6pvllvp6A.jpg" alt="" style="width:120px;height:150px;"></div>
                <div class="name-rl">Ký sự Code dạo</div>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-6 book-rl">
                <div class="images-rl"><img src="http://localhost/lv/upload/img/book/A6pvllvp6A.jpg" alt="" style="width:120px;height:150px;"></div>
                <div class="name-rl">Ký sự Code dạo</div>
            </div>
            </div>
        </div>
    </div>
</div>