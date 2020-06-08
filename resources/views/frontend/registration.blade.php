@extends('layouts.index')

@section('main')

<div class="container login">
    <div class="row form-login">   
        <div class="col-lg-6  col-sm-6">
            <h1> Đăng Kí Thành viên THE COFFEE</h1>
            <img src="{{ url('/') }}/public/images/registration.jpg" alt="" class="image-registration">
        </div>

        <div class="col-lg-6 col-sm-6 form-center">

          <form action="" method="POST" accept-charset="utf-8" class="login-form">

            <label>Tài khoản: <span class="color-red">*</span></label>
            <input type="text"  class="form-control" placeholder="Tài khoản" name="username" autofocus>
            @if($errors->has('username'))
            <div class="help-block color-red">
                {!!$errors->first('username')!!}
            </div>
            @endif

            
            <label class="password"> Mật Khẩu:<span class="color-red">*</span> </label>
            <input type="password"  class="form-control" placeholder="Mật khẩu" name="password">
            @if($errors->has('password'))
            <div class="help-block color-red">
                {!!$errors->first('password')!!}
            </div>
            @endif


            <label class="password"> Nhập lại mật Khẩu: <span class="color-red">*</span></label>
            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_rp">

            @if($errors->has('password_rp'))
            <div class="help-block color-red">
                {!!$errors->first('password_rp')!!}
            </div>
            @endif

            <label>Email: <span class="color-red">*</span></label>
            <input type="email" id="email" class="form-control" placeholder="Email" name="email" >

            @if($errors->has('email'))
            <div class="help-block color-red">
                {!!$errors->first('email')!!}
            </div>
            @endif

            <label>Tên đầy đủ:<span class="color-red">*</span></label>
            <input type="text" id="fullname" class="form-control" placeholder="Tên đầy đủ của bạn" name="full_name" 
            >

            @if($errors->has('full_name'))
            <div class="help-block color-red">
                {!!$errors->first('full_name')!!}
            </div>
            @endif

            <label>Địa chỉ:<span class="color-red">*</span> </label>
            <input type="text" id="address" class="form-control" placeholder="Địa chỉ của bạn" name="address" >

            @if($errors->has('address'))
            <div class="help-block color-red">
                {!!$errors->first('address')!!}
            </div>
            @endif

            <label>Số điện thoại:<span class="color-red">*</span></label>
            <input type="tel" id="phone" class="form-control" placeholder="Số điện thoại" name="phone" >

            @if($errors->has('phone'))
            <div class="help-block color-red">
                {!!$errors->first('phone')!!}
            </div>
            @endif

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <a href="{{ route('registration')}}"><button class="btn btn-lg  btn-block btn-registration" type="submit">Đăng Kí</button></a>
            
        </form>

    </div>
</div>
</div>
@stop()