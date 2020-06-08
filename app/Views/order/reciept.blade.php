@extends('layouts.backend')
@section('title','/ ĐƠN HÀNG')
@section('box-title','Thông tin hóa đơn')

@section('box-body')
	
		<div class="form-group">
			<h4 style="margin:35px 0px;">KHÁCH HÀNG</h4>
			<p>Họ tên: {{ $user->full_name }}</p>
			<p>Địa chỉ: {{ $user->address }}</p>
			<p>Số điện thoại: {{ $user->phone }}</p>
		</div>

		<h4 style="margin:35px 0px;">DANH SÁCH SẢN PHẨM</h4>

		<table class="table table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Giá bán</th>
					<th>Thành tiền</th>
					<th class="text-center">Tác vụ</th>
				</tr>
			</thead>

			<tbody>
				@if(count($cart->items))
				<?php $stt =1; ?>
				@foreach($cart->items as $item)
				@php
				$tt = $item['quantity']*$item['price']; 
				@endphp
				<tr>
					<td>{{ $stt }}</td>
					<td>{{ $item['name'] }}</td>
					<form action="{{route('backend.update-order')}}" class="form-inline" method="get">
						<td>
							<div class="form-group">
								<input type="number" name="quantity" value="{{ old('quantity',isset($item['quantity']) ? $item['quantity'] : old('quantity')) }}">
							</td>
							<td>
								<input type="number" name="price" value="{{ old('price',isset($item['price']) ? $item['price'] : old('price')) }}">

								<button type="submit" class="btn btn-success" style="padding: 2px 9px; margin-left: 10px;">Cập nhật</button>

								<input type="hidden" name="id" value="{{$item['id']}}">
								<input type="hidden" name="s_id" value="{{$user->id}}">
							</td>

						</form>

						<td>{{ number_format($tt,0,'','.') }}đ</td>

						<td align="center">
							<a href="{{ route('backend.remove-order',['id'=>$item['id'],'s_id'=> $user->id]) }}" title="Xóa sản phẩm này" class="label label-danger" style="border: 0; font-size: 10px" onclick="return confirm('Bạn muốn xóa sản phẩm này?')">Xóa</a>
						</td>
					</tr>

					@endforeach
					@endif

				</tbody>

				<tfoot>
					<tr>
						<th colspan="2" style="text-align: center; font-size: 20px;">Tổng cộng</th>
						<th>
							<span style="font-size: 20px;">{{number_format($cart->quanti(),0,'','.')}}</span>
						</th>

						<th>
							
						</th>
						<th>
							<span style="font-size: 20px;">{{number_format($cart->total(),0,'','.')}}đ</span>
						</th>

						<th class="text-center">
							<a href="{{ route('backend.clear-order',['s_id'=> $user->id]) }}"  title="Xóa toàn bộ sản phẩm" class="color-red" onclick="return confirm('Bạn muốn xóa toàn bộ đơn hàng?')">
								<i class="glyphicon glyphicon-trash" style="font-size: 20px;"></i>
							</a>
						</th>
					</tr>
				</tfoot>

			</table>
			<br/><br/>

			<div class="text-center">
				<a href="{{ route('backend.order-add-product',['s_id'=> $user->id]) }}" class="btn btn-primary">Thêm sản phẩm</a>
				<a href="{{ route('backend.order-create',['s_id'=>$user->id]) }}" class="btn btn-success">Xác nhận đơn hàng</a>
			</div>

@stop()
