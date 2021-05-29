<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('public/backend/images/logo.ico') }}">
    <title>Đăng Nhập</title>

    @include('admin.css_head')
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{URL::to('/xacthuc')}}" method="post">
                        {{ csrf_field() }}
                        <div class="animate__animated animate__swing" style="height: 100%;padding: 10px;margin-bottom: 20px;border:2px;box-shadow: 1px 1px 4px 1px #2f2a5a;font-size: 17px;">
                        <h1 >Đăng Nhập</h1>
                        <h2>
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="fa fa-bullhorn" style="color:red"> '.$message.'</span>';
                                    Session::put('message',null);
                                }
                            ?>
                        </h2>
                        <div>
                            <input type="text" class="form-control" placeholder="Tài khoản" required="" name="admin_username"/>
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="admin_password"/>
                        </div>
                        <div>
                            <input type="submit" value="Đăng nhập" name="login" class="btn btn-default">
                            {{-- <a class="btn btn-default submit" href="" style="padding:1px">Đăng nhập</a> --}}
                            <a class="reset_pass" href="#">Quên mật khẩu?</a>
                        </div>
                        <div class="clearfix"></div>


                        </div>
                        <div class="separator">
                            {{-- <p class="change_link">New to site?
                            <a href="#signup" class="to_register"> Create Account </a>
                            </p> --}}
                        <div class="clearfix"></div>
                        <br />
                        </div>
                        <div>
                            <h1><i class="fa fa-paint-brush"></i> Shop Vệ Sinh Giày 7S</h1>
                            <p>©2021 Developed by <a href="{{asset('https://www.facebook.com/ender.hsn05/')}}">Ender</p>
                        </div>
                    </form>
                </section>
            </div>

            {{-- <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div> --}}
        </div>
    </div>
</body>

</html>

