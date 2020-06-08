@extends('layouts.backend')
@section('title','/ QUYỀN QUẢN LÝ')
@section('box-title','Thêm mới quyền quản lý')
@section('box-body')	

<div class="container">
	<form action="{{ route('backend.role-create')}}" method="POST" role="form">
	
		<div class="form-group">
			<label for="">Tên quyền quản lý</label>
			<input type="text" class="form-control input-width" placeholder="Tên quyền quản lý" name="name">
			@if($errors->has('name'))
				<div class="help-block">
					{!!$errors->first('name')!!}
				</div>
			@endif
		</div>

		<div class="form-group">
			<label for="">Mã quyền quản lý</label>
			<input type="text" class="form-control input-width" placeholder="Mã quyền quản lý" name="role_key">
			@if($errors->has('role_key'))
				<div class="help-block">
					{!!$errors->first('role_key')!!}
				</div>
			@endif
		</div>
			
	    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm quyền quản lý</button>
	</form>
</div>
	
@stop()