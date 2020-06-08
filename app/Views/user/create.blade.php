@extends('layouts.backend')
@section('title','/ KHÁCH HÀNG')
@section('box-title','Thêm khách hàng')
@section('box-body')

	<div class="container">

		<form action="{{ route('backend.user-create')}}" method="POST" accept-charset="utf-8">
            
            <div class="row">
            	<div class="col-md-6">
                    
                    <div class="form-group">
						<label>Họ tên:<span class="color-red">*</span> </label>
						<input type="text" id="full_name" class="form-control input-width" placeholder="Tài khoản" name="full_name" autofocus >
						@if($errors->has('full_name'))
						<div class="help-block">
							{!!$errors->first('full_name')!!}
						</div>
						@endif
					</div>

					<div class="form-group">
						<label>Số điện thoại:<span class="color-red">*</span></label>
						<input type="tel" id="phone" class="form-control input-width" placeholder="Số điện thoại" name="phone" autofocus  >
						@if($errors->has('phone'))
						<div class="help-block">
							{!!$errors->first('phone')!!}
						</div>
						@endif
					</div>

					<div class="form-group">
						<label>Địa chỉ:<span class="color-red">*</span> </label>
						<input type="text" id="address" class="form-control input-width" placeholder="Địa chỉ của khách hàng" name="address" autofocus  >
						@if($errors->has('address'))
						<div class="help-block">
							{!!$errors->first('address')!!}
						</div>
						@endif
					</div>
				</div>
            </div>
			
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm khách hàng</button>

		</form>
	</div>

@stop()