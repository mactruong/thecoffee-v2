@extends('layouts.backend')
@section('title','/ SẢN PHẨM')
@section('box-title','Danh sách sản phẩm')
@section('box-body')


	<h3>Danh sách sản phẩm cần tìm</h3>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th class="width-review">Mô tả</th>
				<th>Giá</th>
				<th>Ảnh</th>
				<th>Quảng cáo</th>
				<th>Tác vụ</th>
			</tr>
		</thead>

		<tbody>
			@foreach($products as $pro)
			<tr>
				<td>{{ $pro->id }}</td>
				<td>{{ $pro->name }}</td>
				<td>{{ $pro->review }}</td>
				<td>{{ $pro->price }}</td>
				<td><img src="{{ url('/')}}/public/images/{{ $pro->image }}" class="width-image"></td>
				<td>{{ $pro->promo}}</td>
				<td>
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

@stop
