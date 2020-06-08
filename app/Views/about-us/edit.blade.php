@extends('layouts.backend')
@section('title','/ THÔNG TIN CỬA HÀNG')
@section('box-title','Thông tin cửa hàng')
@section('box-body')

	<div class="container">

		<form action="" method="POST" class="m-b-25" accept-charset="utf-8" enctype="multipart/form-data">
	
			<div class="form-group">
				<label for="">Địa chỉ: <span class="color-red">*</span> </label>
				<input type="text" class="form-control input-width" placeholder="Địa chỉ" name ="address" value="{{ old('address',isset($model->address) ? $model->address : null) }}">

				@if($errors->has('address'))

				<div class="help-block">
					{!!$errors->first('address')!!}
				</div>

				@endif
			</div>
				
			<div class="form-group" >
				<label for="">Số điện thoại: <span class="color-red">*</span> </label>

				<input type="text" class="form-control input-width" placeholder="Số điện thoại" name ="phone" value="{{ old('phone',isset($model->phone) ? $model->phone : null) }}">

				@if($errors->has('phone'))

				<div class="help-block">
					{!!$errors->first('phone')!!}
				</div>

				@endif
			</div>

			<div class="row">
				<div class="col-md-6">
					
					<div class="form-group" >
						<label for="">Email: <span class="color-red">*</span> </label>

						<input type="text" class="form-control input-width" placeholder="Email" name ="email" value="{{ old('email',isset($model->email) ? $model->email : null) }}">

						@if($errors->has('email'))

						<div class="help-block">
							{!!$errors->first('email')!!}
						</div>

						@endif
					</div>

					<div class="form-group" >
						<label for="">Thời gian mở cửa: <span class="color-red">*</span> </label>

						<input type="text" class="form-control input-width" placeholder="Thời gian mở cửa" name ="time_work" value="{{ old('time_work',isset($model->time_work) ? $model->time_work : null) }}">

						@if($errors->has('time_work'))

						<div class="help-block">
							{!!$errors->first('time_work')!!}
						</div>

						@endif
					</div>

					<div class="form-group" >
						<label for="">Link Google Map: </label>

						<input type="text" class="form-control input-width" placeholder="Link google map" name ="link_map" value="{{ old('link_map',isset($model->link_map) ? $model->link_map : null) }}">

					</div>
					
				</div>

				<div class="col-md-6">
					<div class="form-group" >
						<label for="">Link Facebook:  </label>

						<input type="text" class="form-control input-width" placeholder="Link Fanpage facebook" name ="link_fb" value="{{ old('link_fb',isset($model->link_fb) ? $model->link_fb : null) }}">

					</div>

					<div class="form-group" >
						<label for="">Link Instagram:</label>

						<input type="text" class="form-control input-width" placeholder="Link instagram" name ="link_instagram" value="{{ old('link_instagram',isset($model->link_instagram) ? $model->link_instagram : null) }}">

					</div>

					<div class="form-group" >
						<label for="">Link Youtube:</label>

						<input type="text" class="form-control input-width" placeholder="Link youtube" name ="link_youtube" value="{{ old('link_youtube',isset($model->link_youtube) ? $model->link_youtube : null) }}">

					</div>
				
				</div>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">

			 
			<button type="submit" class="btn btn-success m-b-25"> <i class="fa fa-gg" aria-hidden="true"></i> Lưu chỉnh sửa</button>

		</form>

		<a href="{{route('backend.about-us')}}">
			<button class="btn btn-warning"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Quay về</button>
		</a>
	</div>

@stop()