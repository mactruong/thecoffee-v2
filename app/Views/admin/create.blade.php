@extends('layouts.backend')
@section('title','/ TÀI KHOẢN')
@section('box-title','Thêm tài khoản nhân viên')
@section('box-body')

<div class="container">

	<form action="{{route('backend.admin-create')}}" method="POST" accept-charset="utf-8">
        
        <div class="row">
        	<div class="col-md-6">
		        
		        <div class="form-group">
					<label> Tài khoản:<span class="color-red">*</span> </label>
					<input type="text" id="username" class="form-control input-width" placeholder="Tài khoản" name="username" autofocus>
					@if($errors->has('username'))
					<div class="help-block">
						{!!$errors->first('username')!!}
					</div>
					@endif
				</div>

				<div class="form-group">
					<label class="password"> Mật Khẩu:<span class="color-red">*</span> </label>

					<input type="password"  class="form-control input-width" placeholder="Mật khẩu" name="password" >
					@if($errors->has('password'))
					<div class="help-block">
						{!!$errors->first('password')!!}
					</div>
					@endif
				</div>

				<div class="form-group">
					<label class="password"> Nhập lại mật Khẩu: <span class="color-red">*</span></label>
					<input type="password" class="form-control input-width" placeholder="Nhập lại mật khẩu" name="password_rp" >
					@if($errors->has('password_rp'))
					<div class="help-block">
						{!!$errors->first('password_rp')!!}
					</div>
					@endif
				</div>

				<div class="form-group ">
					<label for="">Chọn quyền quản lý</label>
					<select name="id_role" id="" class="form-control input-width" required >
						<option value="">Chọn quyền</option>

						@foreach($role as $ro)
						<option value="{{$ro->id}}">
							{{$ro->name}}
						</option>
						@endforeach
					</select>
					@if($errors->has('id_role'))
							<div class="help-block">
								{!!$errors->first('id_role')!!}
							</div>
				    @endif
				</div>

        	</div>

        	<div class="col-md-6">
		        
		        <div class="form-group">
					<label>Email: <span class="color-red">*</span></label>
					<input type="email" id="email" class="form-control input-width" placeholder="Email" name="email" autofocus >
					@if($errors->has('email'))
					<div class="help-block">
						{!!$errors->first('email')!!}
					</div>
					@endif
				</div>
				
				<div class="form-group">
					<label>Họ tên:<span class="color-red">*</span> </label>
					<input type="text" id="full_name" class="form-control input-width" placeholder="Họ tên" name="full_name" autofocus >
					@if($errors->has('full_name'))
					<div class="help-block">
						{!!$errors->first('full_name')!!}
					</div>
					@endif
				</div>

        	</div>
        	
        </div>
		
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm tài khoản</button>

	</form>
</div>

@stop()