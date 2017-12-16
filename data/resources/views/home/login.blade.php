<div class="container">
   
    <header>
        <h1>Thư Viện <img src="{{ asset('lib/home/resources/img/logo-01.png') }}" width="60px">Khiếm Thị</h1>

    </header>
    <section>       
        <div id="container_demo" >
            <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" class="animate form">
                    <form  method="post" action="{{ route('postdangnhapUser') }}"> 
                       {{ csrf_field() }}
                        <h1>Đăng Nhập</h1> 
                        <p> 
                            <label for="username" class="uname" > Tên Đăng Nhập </label>
                            <input id="username" name="username" required="required" type="text"/>
                        </p>
                        <p> 
                            <label for="password" class="youpasswd"> Mật Khẩu </label>
                            <input id="password" name="password" required="required" type="password" /> 
                        </p>
                        <p class="keeplogin"> 
                          <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
                          <label for="loginkeeping">Tự động đăng nhập</label>
                        </p>
                        <p><a id="forgetpass" href="">Bạn cần trợ giúp đăng nhập ?</a></p>

                        <p class="signin button"> 
                            <input type="submit" value="Xác Nhận"/> 
                        </p>
                        <p class="change_link">
                        Vui lòng nhập đúng tài khoản
                        <a href="#toregister" class="to_register">Đăng ký ngay !</a>
                        </p>
                    </form>
                </div>

                <div id="register" class="animate form">
                    <form  action="mysuperscript.php" autocomplete="on"> 
                        <h1> Đăng Ký </h1> 
                        <p> 
                            <label for="usernamesignup" class="uname" >Tên Tài Khoản</label>
                            <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="TenTaiKhoan" />
                        </p>
                        <p> 
                            <label for="emailsignup" class="youmail"  > Thư Điện Tử</label>
                            <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="email@email.com"/> 
                        </p>
                        <p> 
                            <label for="passwordsignup" class="youpasswd" >Mật Khẩu </label>
                            <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="Mật khẩu trên 8 ký tự"/>
                        </p>
                        <p> 
                            <label for="passwordsignup_confirm" class="youpasswd" >Xác Nhận Lại Mật Khẩu </label>
                            <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="Mật khẩu đã nhập ở khung trên"/>
                        </p>
                        <p class="signin button"> 
                            <input type="submit" value="Tham Gia"/> 
                        </p>
                        <p class="change_link">  
                        Đã có tài khoản?
                        <a href="#tologin" class="to_register"> Trở lại đăng nhập </a>
                        </p>
                    </form>
                </div>
    
            </div>
        </div>  
    </section>
</div>