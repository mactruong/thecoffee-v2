@extends('layouts.index')

@section('main')

<div class="container login">
    <div class="row form-login">   
        <div class="col-lg-6  col-sm-6">
            <h1>Thay đổi mật khẩu</h1>
            <img src="{{ url('/') }}/public/images/registration.jpg" alt="" class="image-registration">
        </div>

        <div class="col-lg-6 col-sm-6 form-center">

          <form action="" method="POST" accept-charset="utf-8" class="login-form">
            
            <div class="user-name" style="padding: 20px 0">
            <b> Tài khoản: <span style="font-size: 20px"> {{ Auth::user()->username }} </span></b>
            </div>

             <label class="password"> Mật Khẩu cũ:<span class="color-red">*</span> </label>
            <input type="password"  class="form-control" placeholder="Mật khẩu cũ" name="oldPassword">

            @if($errors->has('oldPassword'))
            <div class="help-block color-red">
                {!!$errors->first('oldPassword')!!}
            </div>
            @endif
        
            <label class="password"> Mật Khẩu mới:<span class="color-red">*</span> </label>
            <input type="password"  class="form-control" placeholder="Mật khẩu mới" name="newPassword">

            @if($errors->has('newPassword'))
            <div class="help-block color-red">
                {!!$errors->first('newPassword')!!}
            </div>
            @endif


            <label class="password"> Nhập lại mật Khẩu mới: <span class="color-red">*</span></label>
            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="confirmPassword">

            @if($errors->has('confirmPassword'))
            <div class="help-block color-red">
                {!!$errors->first('confirmPassword')!!}
            </div>
            @endif

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <a href=""><button class="btn btn-lg  btn-block btn-registration" type="submit">Thay đổi</button></a>
            
        </form>

    </div>
</div>
</div>
@stop()