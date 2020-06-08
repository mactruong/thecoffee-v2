@extends('layouts.backend')
@section('title','/ HÓA ĐƠN')
@section('box-body')
	<form  method="POST" role="form">
		<?php $days = date('Y-m-d H:i:s');
		
		?>

		<style type="text/css">
			.table > thead > tr > th{
				border-bottom: 1px solid grey;
			}
			.table>tbody>tr>td,
			.table > tfoot > tr > th{
				border-top: 1px solid grey;
			}
		</style>

		<div class="container" style="border: 1px solid #000; width: 100%">
			<div class="text-center" style="margin-bottom: 50px;">
				<h2>HÓA ĐƠN BÁN HÀNG</h2>
				<h4>Giờ bán: {{ date('H:i:s, d-m-Y ', strtotime($days . ' + 7 hours')) }}</h4>
			</div>

			<div class="text-left">
				
				<input type="hidden" name="admin_id" value="{{ Auth::guard('admin')->user()->id }}"/>
				<div class="row">
					<div class="col-md-7">
						<h5>Khách hàng: <span class="font-bold">{{ $user->full_name }} </span></h5>
						<h5>Địa chỉ: <span class="font-bold">{{ $user->address }}</span> </h5>
						<h5>SĐT: <span class="font-bold">{{ $user->phone }}</span> </h5>
					</div>
					<div class="col-md-5">
						<h5>Nhân viên: <span class="font-bold"> {{ Auth::guard('admin')->user()->full_name }} </span></h5>
					</div>
				</div>
			</div>
			
			<table class="table" border="1">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên sản phẩm</th>
						<th>Đơn giá</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
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
						<td>{{ $item['price'] }}đ</td>
						<td>{{ $item['quantity'] }}</td>
						<td>{{ number_format($tt,0,'','.') }}đ</td>
					</tr>
					@endforeach
					@endif
				</tbody>

				<tfoot>
					<tr>
						<th colspan="3" style="font-size: 16px;">Tổng cộng:</th>
						<th style="font-size: 16px;">{{number_format($cart->quanti(),0,'','.')}}</th>
						<th style="font-size: 16px;">{{number_format($cart->total(),0,'','.')}}đ</th>
						<input type="hidden" name="sum" value="{{$cart->total()}}"/>
					</tr>
				</tfoot>

			</table>

			<div style="text-align: center; margin-bottom: 10px">
				Xin cảm ơn bạn! Hẹn gặp lại
			</div>

		</div>

		<div class="text-center" style="margin: 40px 0px;">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<button type="submit" class="btn btn-success">Xác nhận và in hóa đơn</button>
		</div>

	</form>
	
	<a href="{{ route('backend.order-reciept',['s_id'=>$user->id]) }}">Trở về thông tin đơn hàng</a>
@stop()
