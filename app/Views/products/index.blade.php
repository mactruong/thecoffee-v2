@extends('layouts.backend')
@section('title','/ SẢN PHẨM')
@section('box-title','Danh sách sản phẩm')
@section('box-body')
    
    <div class="m-b-10">
    	Tìm kiếm sản phẩm: 
    </div>
	<div>
		<input type="text" class="form-control input-search input-width"  id="inputSearchProduct" onkeyup="searchProduct()" placeholder="Nhập tên sản phẩm" name="value">
	</div>

	<table class="table table-hover">
		
		<thead>
			<tr>
				<th class="text-center">Mã</th>
				<th>Tên Sản phẩm</th>
				<th class="width-review">Mô tả</th>
				<th>Giá</th>
				<th>Ảnh</th>
				<th>Tiêu đề quảng cáo</th>
				<th>Danh mục</th>
				<th class="text-center">Tác vụ</th>
			</tr>
		</thead>

		<!-- <tbody id="tbody-products"> -->
			
		<tbody id="list-products">	

			@foreach($products as $pro)

			<tr>
				<td align="center">{{ $pro->id }}</td>
				<td>{{ $pro->name }}</td>
				<td>{{ $pro->review }}</td>
				<td>{{ $pro->price }}</td>
				<td align="center">
					<img src="{{ url('/')}}/public/images/{{ $pro->image }}" class="width-image" >
				</td>
				<td>{{ $pro->promo}}</td>
				<td>{{$pro->category_name}}</td>
				<td align="center">
					<a href="{{ route('backend.products-edit',[$pro->id]) }}" class="label label-success" title="Sửa">Sửa</a>
					<a href="{{ route('backend.products-delete',[$pro->id])}}" class="label label-danger" onclick="return confirm('Bạn muốn xóa sản phẩm này')" title="Xóa">Xóa</a>
				</td>
			</tr>
			@endforeach()	
		</tbody>

	</table>

	<div class="text-center">
		{{ $products->links() }}		
	</div>

	<!-- <script src="{{ url('/') }}/public/backend/js/ajax/ajax-products.js"></script> -->
@stop
