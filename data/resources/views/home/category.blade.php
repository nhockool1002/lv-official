<div class="col-md-3 left-shelf">
  @include('home.hiuser')
   <ul class="nav nav-tabs">
      <li><a data-toggle="tab" href="#menu1" id="moinhat">Nổi bật</a></li>
      <li><a data-toggle="tab" href="#menu2" id="xemnhieu">Xem nhiều</a></li>
   </ul>
   <div class="tab-content">
      <div id="menu1" class="tab-pane" style="display:block;">
         <div class="list-group">
           @foreach($spec as $row)
            <a href="#" class="list-group-item">
               <h4 class="list-group-item-heading">{{$row->book_name}} - {{ $row->author->auth_name }}</h4>
               <p class="list-group-item-text">Ngày đăng: {{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y') }}</p>
            </a>
            @endforeach
         </div>
      </div>
      <div id="menu2" class="tab-pane fade" style="display:none;">
         <div class="list-group">
            <a href="#" class="list-group-item">
               <h4 class="list-group-item-heading">Sách 1 - Tác giả 1</h4>
               <p class="list-group-item-text">Lượt xem : 1000</p>
            </a>
            <a href="#" class="list-group-item">
               <h4 class="list-group-item-heading">Sách 1 - Tác giả 1</h4>
               <p class="list-group-item-text">Lượt xem : 1000</p>
            </a>
            <a href="#" class="list-group-item">
               <h4 class="list-group-item-heading">Sách 1 - Tác giả 1</h4>
               <p class="list-group-item-text">Lượt xem : 1000</p>
            </a>
            <a href="#" class="list-group-item">
               <h4 class="list-group-item-heading">Sách 1 - Tác giả 1</h4>
               <p class="list-group-item-text">Lượt xem : 1000</p>
            </a>
            <a href="#" class="list-group-item">
               <h4 class="list-group-item-heading">Sách 1 - Tác giả 1</h4>
               <p class="list-group-item-text">Lượt xem : 1000</p>
            </a>
            <a href="#" class="list-group-item">
               <h4 class="list-group-item-heading">Sách 1 - Tác giả 1</h4>
               <p class="list-group-item-text">Lượt xem : 1000</p>
            </a>
         </div>
      </div>
   </div>
</div>