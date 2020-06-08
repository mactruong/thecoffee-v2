@extends('layouts.backend')
@section('title','/ BÀI VIẾT')
@section('box-title','Thêm mới bài viết')
@section('box-body')

	<div class="container">
		<form action="{{ route('backend.news-create')}}" method="POST" role="form" enctype="multipart/form-data">
			

			<div class="form-group" >
				<label for="">Title</label>
				<textarea name="title" id = "title-name"  class="form-control input-new input-height-new" onkeyup="ChangeToSlug()"></textarea>
				@if($errors->has('title'))
				<div class="help-block">
					{!!$errors->first('title')!!}
				</div>
				@endif
			</div>

			<input type="hidden" id = "slug" class="form-control" name="slug">

			<div class="form-group" >
				<label for="">Mở đầu</label>
				<textarea name="short_content" id="" class="form-control input-new input-height-new"></textarea>
				@if($errors->has('short_content'))
				<div class="help-block">
					{!!$errors->first('short_content')!!}
				</div>
				@endif
			</div>
			
			<div class="form-group" >
				<label for="">Bài viết</label>
				<textarea name="full" id="" class="form-control input-new input-height-new"></textarea>
				@if($errors->has('full'))
				<div class="help-block">
					{!!$errors->first('full')!!}
				</div>
				@endif
			</div>
			
			<div class="form-group">
				<label for="">Ảnh bài viết</label><br/>

				<div class='file-input'>
					<input type='file' name="images" id="filename" id="file-blog">
					<span class='button'>Chọn Ảnh</span>
					<span class='label' data-js-label>Bạn chưa chọn ảnh nào? </label>
				</div>

				@if($errors->has('images'))
				<div class="help-block">
					{!!$errors->first('images')!!}
				</div>
				@endif
			</div>

			<div class="form-group" >
                <img id="img_upload" class="img img-responsive" src="" alt="" width="200">
            </div>
			
			<input type="hidden" name="admin_id" value="{{ Auth::guard('admin')->user()->id }}"/>

			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm bài viết</button>
		</form>
	</div>

@stop()