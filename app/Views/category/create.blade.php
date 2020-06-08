@extends('layouts.backend')
@section('title','/ DANH MỤC')
@section('box-title','Thêm mới danh mục')	
@section('box-body')

<div class="container">
	<form action="{{ route('backend.category-create')}}" method="POST" role="form">
	
		<div class="form-group">
			<label for="">Tên danh mục</label>
			<input type="text" id="title-name" class="form-control input-width" placeholder="Tên danh mục" onkeyup="ChangeToSlug()"; name="name">
			
			@if($errors->has('name'))
				<div class="help-block">
					{!!$errors->first('name')!!}
				</div>
			@endif
		
			<input type="hidden" id="slug" class="form-control" placeholder="Đường dẫn tĩnh" name="slug">
		</div>
		
	    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm danh mục</button>
		
	</form>
</div>

@stop()