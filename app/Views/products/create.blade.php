@extends('layouts.backend')
@section('title','/ SẢN PHẨM')
@section('box-title','Thêm mới sản phẩm')
@section('box-body')

	<div class="container">
		<form action="{{ route('backend.products-create')}}" method="POST" role="form" enctype="multipart/form-data">
            
            <div class="row">
            	<div class="col-md-6">

		            <div class="form-group">
						<label for="">Tên sản phẩm</label>
						<input type="text" id = "title-name" class="form-control input-width" placeholder="Tên sản phẩm" onkeyup="ChangeToSlug()" name="name">
						@if($errors->has('name'))
						<div class="help-block">
							{!!$errors->first('name')!!}
						</div>
						@endif
					</div>

					<input type="hidden" id = "slug" class="form-control input-width" name="slug" >
					

					<div class="form-group">
						<label for="">Giá của sản phẩm</label>
						<input type="number" class="form-control input-width" placeholder="Giá sản phẩm" name="price" >
						@if($errors->has('price'))
						<div class="help-block">
							{!!$errors->first('price')!!}
						</div>
						@endif
					</div>

					<div class="form-group">
						<label for="">Title quảng cáo</label>
						<input type="text" class="form-control input-width" placeholder="Title quảng cáo" name="promo">
						@if($errors->has('promo'))
						<div class="help-block">
							{!!$errors->first('promo')!!}
						</div>
						@endif
					</div>


					<div class="form-group ">
						<label for="">Danh mục</label>
						<select name="cat_id" id="" class="form-control input-width" required>
							<option value="">Chọn danh mục</option>

							@foreach($cats as $cat)
							<option value="{{$cat->id}}">
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
						<label for="">Ảnh sản phẩm</label><br/>

						<div class='file-input'>
							<input type='file' name="image" id="filename">
							<span class='button'>Chọn Ảnh</span>
							<span class='label' data-js-label>Bạn chưa chọn ảnh nào? </label>
						</div>
						
						@if($errors->has('image'))
						<div class="help-block">
							{!!$errors->first('image')!!}
						</div>
						@endif
					</div>

					<div class="form-group" >
		                <img id="img_upload" class="img img-responsive" src="" alt="" width="350">
		            </div>

					<div class="form-group" >
						<label for="">Mô tả sản phẩm</label>
						<textarea name="review" id="" class="form-control input-width input-height"></textarea>
						@if($errors->has('review'))
						<div class="help-block">
							{!!$errors->first('review')!!}
						</div>
						@endif
					</div>

            	</div>
            	
            </div>

			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm sản phẩm</button>
		</form>
	</div>

@stop()