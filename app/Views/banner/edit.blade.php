@extends('layouts.backend')
@section('title','/ BANNER')
@section('box-title','Banner trang chủ')
@section('box-body')

	<div class="container">

		<form action="" method="POST" class="m-b-25" accept-charset="utf-8" enctype="multipart/form-data">
	
			<div class="form-group">
				<label for="">Tiêu đề: <span class="color-red">*</span> </label>
				<input type="text" class="form-control input-width" placeholder="Tiêu đề" name ="title" value="{{ old('title',isset($model->title) ? $model->title : null) }}">

				@if($errors->has('title'))

				<div class="help-block">
					{!!$errors->first('title')!!}
				</div>

				@endif
			</div>
				
			<div class="form-group" >
				<label for="">Nội dung: <span class="color-red">*</span> </label>

				<textarea name="descriptions" id="" class="form-control input-new input-height-new" >
					{{ old('descriptions',isset($model->descriptions) ? $model->descriptions : null) }}
				</textarea>

				@if($errors->has('descriptions'))

				<div class="help-block">
					{!!$errors->first('descriptions')!!}
				</div>

				@endif
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Ảnh 1:<span class="color-red">*</span> </label><br/>
					
						<div class='file-input'>
							<input type='file' name="image1" id="chose-image-banner-1">
							<span class='button'>Chọn Ảnh</span>
							<span class='label' data-js-label> {{ old('image1',isset($model->image1) ? $model->image1 : null) }} </label>
						</div>
						
						@if($errors->has('image1'))
						<div class="help-block">
							{!!$errors->first('image1')!!}
						</div>
						@endif

						
                        <div>
                            <img id="img_upload_banner_1" class="img img-responsive" 
                             src="{{ url('/')}}/public/images/{{ old('image1',isset($model->image1) ? $model->image1 : null) }}" 
                             alt="" width="250">
                        </div>
                        
					</div>

					<div class="form-group">
						<label for="">Ảnh 2:<span class="color-red">*</span> </label><br/>

						<div class='file-input'>
							<input type='file' name="image2" id="chose-image-banner-2">
							<span class='button'>Chọn Ảnh</span>
							<span class='label' data-js-label> {{ old('image2',isset($model->image2) ? $model->image2 : null) }} </label>
						</div>
						
						@if($errors->has('image2'))
						<div class="help-block">
							{!!$errors->first('image2')!!}
						</div>
						@endif

						<div>
                            <img id="img_upload_banner_2" class="img img-responsive" 
                             src="{{ url('/')}}/public/images/{{ old('image2',isset($model->image2) ? $model->image2 : null) }}" 
                             alt="" width="250">
                        </div>
					</div>
				</div>

				<div class="col-md-6">
					
					<div class="form-group">
						<label for="">Ảnh 3:<span class="color-red">*</span> </label> <br/>
					
 						<div class='file-input'>
							<input type='file'  name="image3" id="chose-image-banner-3">
							<span class='button'>Chọn Ảnh</span>
							<span class='label' data-js-label> {{ old('image3',isset($model->image3) ? $model->image3 : null) }} </label>
						</div>
						
						@if($errors->has('image3'))
						<div class="help-block">
							{!!$errors->first('image3')!!}
						</div>
						@endif

						<div>
                            <img id="img_upload_banner_3" class="img img-responsive" 
                             src="{{ url('/')}}/public/images/{{ old('image2',isset($model->image3) ? $model->image2 : null) }}" 
                             alt="" width="250">
                        </div>
					</div>

					<div class="form-group">
						<label for="">Ảnh 4:<span class="color-red">*</span> </label><br/>

 						<div class='file-input'>
							<input type='file' name="image4" id="chose-image-banner-4">
							<span class='button'>Chọn Ảnh</span>
							<span class='label' data-js-label> {{ old('image4',isset($model->image4) ? $model->image4 : null) }} </label>
						</div>
						
						
						@if($errors->has('image4'))
						<div class="help-block">
							{!!$errors->first('image4')!!}
						</div>
						@endif

						<div>
                            <img id="img_upload_banner_4" class="img img-responsive" 
                             src="{{ url('/')}}/public/images/{{ old('image4',isset($model->image4) ? $model->image4 : null) }}" 
                             alt="" width="250">
                        </div>
					</div>
				</div>
				
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<button type="submit" class="btn btn-success m-b-25"> <i class="fa fa-gg" aria-hidden="true"></i> Lưu chỉnh sửa</button>

		</form>

		<a href="{{route('backend.banner')}}">
				<button class="btn btn-warning"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Quay về</button>
		</a>
	</div>

@stop()