@extends('layouts.index')

@section('main')

<div class="container login">
    <div class="row form-login">   
        <div class="col-lg-6  col-sm-6">
            <h1>Nhập mã kích hoạt tài khoản</h1>
            <img src="{{ url('/') }}/public/images/registration.jpg" alt="" class="image-registration">
        </div>

        <div class="col-lg-6 col-sm-6 form-center">

          <form action="" method="POST" accept-charset="utf-8" class="login-form">
            
            <label>Mã kích hoạt:<span class="color-red">*</span></label>
            <input type="text" id="active_code" class="form-control" placeholder="Mã kích hoạt" name="active_code" >
            @if($errors->has('active_code'))
            <div class="help-block color-red">
                {!!$errors->first('active_code')!!}
            </div>
            @endif

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <a href=""><button class="btn btn-lg  btn-block btn-registration" type="submit">Kích hoạt</button></a>
            
        </form>

    </div>
</div>
</div>
@stop()