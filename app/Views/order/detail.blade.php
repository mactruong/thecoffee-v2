@extends('layouts.backend')
@section('title','/ ĐƠN HÀNG')
@section('box-title','Chi tiết đơn hàng')

@section('box-body')

<form action="{{ route('backend.order-detail',['id'=>$order->id])}}" method="POST" role="form">
	<?php 
	
	$detail = DB::table('order_detail')->where('order_id', $order->id)->get();
	$customer = DB::table('user')->where('id',$order->id_cus)->first();
	$user = Auth::guard('admin')->user();
    $admin = DB::table('admins')->where('id',$order->admin_id)->first();

	?>
	<p class="title-order-detail">Mã đơn hàng : <span class="font-bold">{{ $order->id }}</span></p>
	
	@if($order->status == 'confirmed')
		<p class="title-order-detail" >Giờ bán:
			<span class="font-bold">
				{{ date('H:i:s, d-m-Y ', strtotime($order->created_at . ' + 7 hours')) }}
			</span>
	    </p>
	@else
		<p class="title-order-detail" >Giờ đặt:
		 	<span class="font-bold">{{ date('H:i:s d-m-Y ', strtotime($order->created_at . ' + 7 hours')) }}</span>
		</p>
    @endif() 

	@if($order->admin_id != null)
     
		<p class="title-order-detail">Nhân viên lập: <span class="font-bold">{{ $admin->full_name }}</span></p>
	
	@endif() 
    
	<h4 class="title-order font-bold ">KHÁCH HÀNG</h4>
    
    @if($order->type == 1)

	<p class="title-order-detail">Tài khoản đặt: <span class="font-bold">{{ $customer->username }}</span></p>
	<p class="title-order-detail">Người nhận: <span class="font-bold">{{ $order->receiver_name }}</span></p>
	<p class="title-order-detail">Địa chỉ: <span class="font-bold">{{ $order->receiver_address }}</span></p>
	<p class="title-order-detail">Số điện thoại: <span class="font-bold">{{ $order->receiver_phone }}</span></p>
	<p class="title-order-detail">Ghi chú: <span class="font-bold">{{ $order->note }}</span></p>
	
	
	@else
		<p class="title-order-detail">Họ tên: <span class="font-bold">{{ $customer->full_name }}</span></p>
		<p class="title-order-detail">Địa chỉ: <span class="font-bold">{{ $customer->address }}</span></p>
		<p class="title-order-detail">Số điện thoại: <span class="font-bold">{{ $customer->phone }}</span></p>
		<p class="title-order-detail">Ghi chú: <span class="font-bold">{{ $order->note }}</span></p>
		
    @endif() 
	
	<h4 class="title-order font-bold ">DANH SÁCH SẢN PHẨM</h4>
	<table class="table table-hover">
		<thead class="title-table-order-detail">
			<tr>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Giá bán</th>					
			</tr>
		</thead>

		<tbody>
			@foreach($detail as $detail)
			<tr>					
				<?php 
				$pro = DB::table('products')->where('id',$detail->pro_id)->first();
				?>				
				<td>{{$pro->name}}</td>
				<td>{{$detail->quantity}}</td>
				<td>{{number_format($detail->price,0,'','.')}}đ</td>
			</tr>
			@endforeach
		</tbody>

		<tfoot>
			<tr>
				<th colspan="2" class="text-center">Tổng cộng:</th>
		
				<th  align="right" class="title-price-order-detail"><span class="price-order-detail">{{number_format($order->sum,0,'','.')}}</span> VNĐ</th>
			</tr>
		</tfoot>

	</table>

	<input type="hidden" name="admin_id" value="{{ Auth::guard('admin')->user()->id }}"/>
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	@if($order->status == 'pending' )
	
	<button type="submit" class="btn-success btn-order-detail" > Xác nhận và in hóa đơn </button>
	
	@endif
</form>

@stop()


