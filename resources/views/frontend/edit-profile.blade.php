@extends('layouts.index')
@section('main')

<div class="container login">
    <div class="row form-login">   
        <div class="col-lg-6  col-sm-6">
            <h3 class="text-center"> CHỈNH SỬA THÔNG TIN CÁ NHÂN </h3>
            <img src="{{ url('/') }}/public/images/registration.jpg" alt="" class="image-registration">
        </div>

        <div class="col-lg-6 col-sm-6 form-center">

          <form action="" method="POST" accept-charset="utf-8" class="login-form">

            <label>Tài khoản: <span class="color-red">*</span></label>
            <input type="text"  class="form-control" placeholder="Tài khoản" name="username" value="{{ old('username',isset($model->username) ? $model->username : null) }}"  autofocus disabled="true" >
    
            <label>Tên đầy đủ:<span class="color-red">*</span></label>
            <input type="text" id="fullname" class="form-control" placeholder="Tên đầy đủ của bạn" name="full_name" value="{{ old('full_name',isset($model->full_name) ? $model->full_name : null) }}">

            @if($errors->has('full_name'))
            <div class="help-block color-red">
                {!!$errors->first('full_name')!!}
            </div>
            @endif

            <label>Địa chỉ:<span class="color-red">*</span> </label>
            <input type="text" id="address" class="form-control" placeholder="Địa chỉ của bạn" name="address" value="{{ old('address',isset($model->address) ? $model->address : null) }}">

            @if($errors->has('address'))
            <div class="help-block color-red">
                {!!$errors->first('address')!!}
            </div>
            @endif

            <label>Email:<span class="color-red">*</span> </label>
            <input type="email" id="address" class="form-control" placeholder="Nhập email của bạn" name="email" value="{{ old('email',isset($model->email) ? $model->email : null) }}">

            @if($errors->has('email'))
            <div class="help-block color-red">
                {!!$errors->first('email')!!}
            </div>
            @endif

            <label>Số điện thoại:<span class="color-red">*</span></label>
            <input type="tel" id="phone" class="form-control" placeholder="Số điện thoại" name="phone" value="{{ old('phone',isset($model->phone) ? $model->phone : null) }}">

            @if($errors->has('phone'))
            <div class="help-block color-red">
                {!!$errors->first('phone')!!}
            </div>
            @endif

            <label class="password"> Mật khẩu :<span class="color-red">*</span> </label>
            <input type="password"  class="form-control" placeholder="Nhập mật khẩu" name="oldPassword">

            @if($errors->has('oldPassword'))
            <div class="help-block color-red">
                {!!$errors->first('oldPassword')!!}
            </div>
            @endif


            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <a href=""><button class="btn btn-lg  btn-block btn-registration" type="submit">CHỈNH SỬA</button></a>
            
        </form>
    </div>

    </div>
</div>
</div>

@stop()