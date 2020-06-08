@extends('layouts.backend')
@section('title','/ TÀI KHOẢN')
@section('box-title','Sửa tài khoản nhân viên')
@section('box-body')

<div class="container">

	<form action="" method="POST" accept-charset="utf-8">

		<div class="form-group">
			<label> Tài khoản:<span class="color-red">*</span> </label>
			<input type="text" id="username" class="form-control input-width" placeholder="Tài khoản" name="username" value="{{ old('username',isset($model->username) ? $model->username : null) }}" readonly="true">
			@if($errors->has('username'))
			<div class="help-block">
				{!!$errors->first('username')!!}
			</div>
			@endif
		</div>
		
		<div class="form-group">
			<label>Email: <span class="color-red">*</span></label>
			<input type="email" id="email" class="form-control input-width" placeholder="Email" name="email" value="{{ old('email',isset($model->email) ? $model->email : null) }}" autofocus >
			@if($errors->has('email'))
			<div class="help-block">
				{!!$errors->first('email')!!}
			</div>
			@endif
		</div>
		
		<div class="form-group">
			<label>Họ tên Mạc:<span class="color-red">*</span> </label>
			<input type="text" id="full_name" class="form-control input-width" placeholder="Tài khoản" name="full_name" value="{{ old('full_name',isset($model->full_name) ? $model->full_name : null) }}"  autofocus >
			@if($errors->has('full_name'))
			<div class="help-block">
				{!!$errors->first('full_name')!!}
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

		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<button type="submit" class="btn btn-success"><i class="fa fa-gg" aria-hidden="true"></i> Lưu chỉnh sửa</button>
	</form>
</div>

@stop()