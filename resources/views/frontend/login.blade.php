@extends('layouts.index')
@section('main')

<div class="container login">
    <div class="row form-login">

        <div class="col-lg-6 col-sm-6">
           <h1> Đăng Nhập Thành viên THE COFFEE</h1>
           <img src="{{ url('/') }}/public/images/registration.jpg" alt="" class="image-registration">
        </div>

        <div class="col-lg-6 col-sm-6 form-center">
            <form action="" method="POST" accept-charset="utf-8" class="login-form">

               <label> Tài khoản: <span class="color-red">*</span></label>
               <input type="text" id="username" class="form-control" placeholder="Tài khoản" name="username" autofocus>

               <label class="password"> Mật Khẩu:<span class="color-red">*</span> </label>
               <input type="password" id="inputPassword" class="form-control" placeholder="Mật khẩu" name="password">

                <div class="remember">
                    <input class="checkbox" type="checkbox" value="remember" value="1" style="margin-right: 8px"> <span>Nhớ mật khẩu</span>
                </div>

                <button class="btn btn-lg  btn-block btn-signin" type="submit">Đăng Nhập</button>

                <input type="hidden" name="_token" value="{{csrf_token()}}">
                 
                <p class="confirm">Bạn chưa có tài khoản? <a href=" {{ route('registration')}}">Đăng kí ngay</a> </p>

            </form>
        </div>

    </div>
</div>
@stop()