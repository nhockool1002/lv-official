<nav class="navbar navbar-inverse">
   <div class="container-fluid">
      <div class="navbar-header">
         <a class="navbar-brand" href="{{ route('home') }}">Giao diện Aplus</a>
      </div>
      <ul class="nav navbar-nav">
         <li class="active"><a href="{{ route('home') }}">Trang chủ</a></li>
         <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Thư viện<span class="caret"></span></a>
            <ul class="dropdown-menu">
               <li><a href="#">Tin tức</a></li>
               <li><a href="#">Sách</a></li>
               <li><a href="#">Khóa học</a></li>
               <li><a href="#">Sách nói</a></li>
            </ul>
         </li>
         <li><a href="#">Phòng trò chuyện</a></li>
      </ul>
      @if(!isset($us))
      <ul class="nav navbar-nav navbar-right">
         <li>
            <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Đăng Nhập</button>
            <div class="modal fade" id="myModal" role="dialog">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <!-- LOGIN FORM -->
                     @include('home.login')
                     <!-- LOGIN FORM -->
                     <br/><br/><br/>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
                     </div>
                  </div>
               </div>
            </div>
         </li>
      </ul>
      @else
      <ul class="nav navbar-nav navbar-right">
         <li>
            <a href="{{ route('getlogoutUser') }}" class="btn btn-warning btn-lg" role="button" type="button" style="color:white">Thoát</a>
         </li>
      </ul>
      @endif
   </div>
</nav>