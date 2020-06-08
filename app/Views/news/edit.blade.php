@extends('layouts.backend')
@section('title','/ BÀI VIẾT')
@section('box-title','Sửa lại bài viết')
@section('box-body')

	<div class="container">
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			
			<div class="form-group" >
				<label for="">Title</label>
				<textarea name="title" id = "title-name" class="form-control input-new input-height-new" onkeyup="ChangeToSlug()">{{ old('title',isset($model->title) ? $model->title : null) }}</textarea>
				@if($errors->has('title'))
				<div class="help-block">
					{!!$errors->first('title')!!}
				</div>
				@endif
			</div>

			<input type="hidden" class="form-control input-new" id = "slug" name="slug" value="{{ old('slug',isset($model->slug) ? $model->slug : null) }}">
			

			<div class="form-group" >
				<label for="">Mở đầu blog</label>
				<textarea name="short_content" id="" class="form-control input-new input-height-new">{{ old('short_content',isset($model->short_content) ? $model->short_content : null) }}</textarea>
				@if($errors->has('short_content'))
				<div class="help-block">
					{!!$errors->first('short_content')!!}
				</div>
				@endif
			</div>

			<div class="form-group" >
				<label for="">Bài viết</label>
				<textarea name="full" id="" class="form-control input-new input-height-new" >{{ old('full',isset($model->full) ? $model->full : null) }}</textarea>
				@if($errors->has('full'))
				<div class="help-block">
					{!!$errors->first('full')!!}
				</div>
				@endif
			</div>
			
			<div class="form-group">
				<label for="">Ảnh sản phẩm</label>
				
				<div class='file-input'>
					<input type='file' name="images" id="file-blog">
					<span class='button'>Chọn Ảnh</span>
					<span class='label' data-js-label>{{ old('image1',isset($model->images) ? $model->images : null) }}</label>
				</div>
				
				@if($errors->has('images'))
				<div class="help-block">
					{!!$errors->first('images')!!}
				</div>
				@endif
			</div>

			<div class="form-group" >
                <img id="img_upload" class="img img-responsive" 
                src="{{ url('/')}}/public/images/{{ old('images',isset($model->images) ? $model->images : null) }}"
                alt="" width="350">
            </div>
					

			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<button type="submit" class="btn btn-success"><i class="fa fa-gg" aria-hidden="true"></i> Lưu chỉnh sửa</button>
		</form>
	</div>
@stop()