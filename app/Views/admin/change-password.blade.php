@extends('layouts.backend')
@section('title','/ TÀI KHOẢN')
@section('box-title','Thay đổi mật khẩu')
@section('box-body')

<div class="container">

	<form action="" method="POST" accept-charset="utf-8">
            
	        <div class="form-group">

	            <label class="password"> Mật khẩu cũ:<span class="color-red">*</span> </label>
	            <input type="password"  class="form-control input-width" placeholder="Mật khẩu cũ" name="oldPassword">

	            @if($errors->has('oldPassword'))
	            <div class="help-block color-red">
	                {!!$errors->first('oldPassword')!!}
	            </div>
	            @endif

	        </div>    
	        
	        <div class="form-group">

	            <label class="password"> Mật khẩu mới:<span class="color-red">*</span> </label>
	            <input type="password"  class="form-control input-width" placeholder="Mật khẩu mới" name="newPassword">

	            @if($errors->has('newPassword'))
	            <div class="help-block color-red">
	                {!!$errors->first('newPassword')!!}
	            </div>
	            @endif

	        </div>

			<div class="form-group">

	            <label class="password"> Nhập lại mật khẩu mới: <span class="color-red">*</span></label>
	            <input type="password" class="form-control input-width" placeholder="Nhập lại mật khẩu mới" name="confirmPassword">

	            @if($errors->has('confirmPassword'))
	            <div class="help-block color-red">
	                {!!$errors->first('confirmPassword')!!}
	            </div>
	            @endif
	 		</div>

            <input type="hidden" name="_token" value="{{csrf_token()}}">

          <button class="btn btn btn-success" type="submit"><i class="fa fa-gg" aria-hidden="true"></i> Lưu thay đổi
          </button>
            
        </form>
</div>

@stop()