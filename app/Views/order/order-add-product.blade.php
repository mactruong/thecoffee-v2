@extends('layouts.backend')
@section('title','/ BÁN HÀNG')
@section('box-title','Chọn sản phẩm')

@section('box-body')

	<div class="" id="sum-order">
		<p>Khách hàng: {{$s->full_name}}</p>
		
	</div>
	<form action="{{ route('backend.order-products-search') }}" method="GET" role="form">
		<div class="d-flex align-items-center" style="justify-content: space-between;">
			<input type="text" class="form-control input-search" id="inputSearchProduct" onkeyup="searchProduct()" placeholder="Tìm kiếm sản phẩm" name="value">

			<a href="{{ route('backend.order-reciept',['s_id'=>$s->id]) }}" class="btn btn-info" style="margin-bottom: 30px; border: 0">Xem đơn hàng</a>

		</div>

	</form>
	<table class="table table-hover">
		<thead>
			<tr>
				<th class="text-center">Mã</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th class="text-center">Ảnh</th>
				<th>Danh mục</th>
				<th class="text-center">Chọn sản phẩm</th>
			</tr>
		</thead>
		
		<tbody id="list-products">	
				@foreach($products as $pro)
					<tr>
						<td align="center">{{ $pro->id }}</td>
						<td>{{ $pro->name }}</td>
						<td>{{number_format($pro->price,0,'','.')}}</td>
						<td align="center">
							<img src="{{ url('/')}}/public/images/{{ $pro->image }}" class="width-image" >
						</td>
						<td>{{$pro->category_name}}</td>

						<td align="center">
							<a href="{{ route('backend.add-order',['id'=>$pro->id,'s_id'=>$s->id,'price'=>$pro->price]) }}" class="btn btn-success" style="border: 0; font-size: 12px" title="Thêm vào đơn hàng" id="click_cart" data-id='{{ $pro->id }}'> Chọn</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="text-center">
			{{ $products->links() }}		
		</div>
	
@stop()