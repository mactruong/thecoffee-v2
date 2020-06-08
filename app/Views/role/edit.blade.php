@extends('layouts.backend')
@section('title','/ QUYỀN QUẢN LÝ')
@section('box-title','Sửa quyền quản lý')
@section('box-body')

<div class="container">

	<form action="" method="POST" accept-charset="utf-8">
		<legend></legend>

	    <div class="form-group">
			<label for="">Tên quyền quản lý</label>
			<input type="text" class="form-control input-width" placeholder="Tên quyền quản lý" id="name" name="name" value="{{ old('name',isset($model->name) ? $model->name : null) }}" readonly="true" >
			@if($errors->has('name'))
				<div class="help-block">
					{!!$errors->first('name')!!}
				</div>
			@endif
		</div>

		<div class="form-group ">
			<label for="">Trạng thái</label>
			<select name="status" id="" class="form-control input-width" required>
				<option value="" >Chọn trạng thái</option>
				<option value="1"> Hoạt động </option>
				<option value="0"> Tắt </option>	
			</select>
		</div>
	
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<button type="submit" class="btn btn-success"><i class="fa fa-gg" aria-hidden="true"></i> Lưu chỉnh sửa</button>
	</form>
</div>

@stop()