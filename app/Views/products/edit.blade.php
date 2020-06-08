@extends('layouts.backend')
@section('title','/ SẢN PHẨM')
@section('box-title','Sửa lại sản phẩm')
@section('box-body')

	<div class="container">
		<form action="" class="m-b-25" method="POST" role="form" enctype="multipart/form-data">
			
			<div class="row">
				<div class="col-md-6">
					
					<div class="form-group">
						<label for="">Tên sản phẩm</label>
						<input type="text" class="form-control input-width" id = "title-name" placeholder="Tên sản phẩm" onkeyup="ChangeToSlug()" name="name"
						value="{{ old('name',isset($model->name) ? $model->name : null) }}">
						@if($errors->has('name'))
						<div class="help-block">
							{!!$errors->first('name')!!}
						</div>
						@endif
					</div>

					<input type="hidden" class="form-control" id = "slug" name="slug" value="{{ old('slug',isset($model->slug) ? $model->slug : null) }}">
					

					<div class="form-group">
						<label for="">Giá của sản phẩm</label>
						<input type="number" class="form-control input-width" placeholder="Giá sản phẩm" name="price"
						value="{{ old('price',isset($model->price) ? $model->price : null) }}">
						@if($errors->has('price'))
						<div class="help-block">
							{!!$errors->first('price')!!}
						</div>
						@endif
					</div>
					
					<div class="form-group">
						<label for="">Title quảng cáo</label>
						<input type="text" class="form-control input-width" placeholder="Title quảng cáo" name="promo"
						value="{{ old('promo',isset($model->promo) ? $model->promo : null) }}">
						@if($errors->has('promo'))
						<div class="help-block">
							{!!$errors->first('promo')!!}
						</div>
						@endif
					</div>

					<div class="form-group">
						<label for="">Danh mục</label>
						<select name="cat_id" id="" class="form-control input-width" required>
							<option value="" >Chọn danh mục</option>

							@foreach($cats as $cat)
							<option value="{{$cat->id}}" <?php if ($cat->id == $model->cat_id) echo "selected";  ?>>
								{{$cat->name}}
							</option>
							@endforeach
						</select>
						@if($errors->has('cat_id'))
						<div class="help-block">
							{!!$errors->first('cat_id')!!}
						</div>
						@endif
					</div>
			
				</div>

				<div class="col-md-6">
					
					<div class="form-group">
						<label for="">Ảnh sản phẩm</label> <br/>
						
						<div class='file-input'>
							<input type='file' name="image" id="filename">
							<span class='button'>Chọn Ảnh</span>
							<span class='label' data-js-label>{{ old('image1',isset($model->image) ? $model->image : null) }}</label>
						</div>


						@if($errors->has('image'))
						<div class="help-block">
							{!!$errors->first('image')!!}
						</div>
						@endif
					</div>

					<div class="form-group" >
		                <img id="img_upload" class="img img-responsive" 
		                src="{{ url('/')}}/public/images/{{ old('image',isset($model->image) ? $model->image : null) }}"
		                alt="" width="150">
		            </div>
					
					<div class="form-group" >
						<label for="">Mô tả sản phẩm</label>
						<textarea name="review" id="" class="form-control input-width input-height">{{ old('review',isset($model->review) ? $model->review : null) }}</textarea>
						@if($errors->has('review'))
						<div class="help-block">
							{!!$errors->first('review')!!}
						</div>
						@endif
					</div>
				</div>
				
			</div>
			
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<button type="submit" class="btn btn-success m-b-25"><i class="fa fa-gg" aria-hidden="true"></i> Lưu chỉnh sửa</button>
		</form>

		<a href="{{route('backend.products')}}">
				<button class="btn btn-warning"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Quay về</button>
		</a>
	</div>
@stop()