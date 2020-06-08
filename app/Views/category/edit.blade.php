@extends('layouts.backend')
@section('title','/ DANH MỤC')
@section('box-title','Sửa danh mục')
@section('box-body')

	<div class="container">

		<form action="" class="m-b-25" method="POST" accept-charset="utf-8">

			<div class="form-group">
				<label for="">Tên danh mục</label>
				<input type="text" class="form-control input-width" id="title-name" placeholder="Tên danh mục"  onkeyup="ChangeToSlug()" name="name" value="{{ old('name',isset($model->name) ? $model->name : null) }}">
				@if($errors->has('name'))
				<div class="help-block">
					{!!$errors->first('name')!!}
				</div>
				@endif
				
				<input type="hidden" class="form-control" id="slug" placeholder="Tên danh mục" name="slug" value="{{ old('slug',isset($model->slug) ? $model->slug : null) }}">
				
			</div>
			
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<button type="submit" class="btn btn-success m-b-25"><i class="fa fa-gg" aria-hidden="true"></i> Lưu chỉnh sửa</button>
		</form>


		<a href="{{route('backend.category')}}">
				<button class="btn btn-warning"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Quay về</button>
		</a>
	</div>

@stop()