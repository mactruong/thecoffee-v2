@extends('layouts.backend')
@section('title','/ ĐƠN HÀNG')
@section('box-title','Danh sách đơn hàng')
@section('box-body')


<div class="tab-content">

    <table class="table table-hover">
		<thead>
			<tr>
				<th class="text-center">Mã</th>
				<th>Khách hàng</th>
				<th>Thông tin đơn hàng</th>
				<th class="text-center">Tổng đơn hàng</th>
				<th>Ngày bán</th>
				<th>Loại đơn</th>
				<th class="text-center">Tác vụ</th>
			</tr>
		</thead>
		<tbody >
			 

		@foreach ($ordercomfirm as $i)
			<?php 
				$i_detail = DB::table('order_detail')->where('order_id',$i->id)->get();			
			 ?>
			<tr>
				<td align="center">{{ $i->id }}</td>

				<td>{{ $i->user_name }}</td>

				<td>
					@foreach($i_detail as $id)
						<?php 
							$pro = DB::table('products')->where('id',$id->pro_id)->first();
						 ?>
						 {{$pro->name}} - SL: {{$id->quantity}}<br>
					@endforeach
				</td>

				<td align="center">{{number_format($i->sum,0,'','.')}}đ</td>

				<td>{{ date('H:i:s, d-m-Y ', strtotime($i->created_at . ' + 7 hours')) }}</td>
 				
 				<td>
				@if( $i-> type == 1 )
				
				    <button type="" class="btn-primary border-0" style="border-radius: 3px">Đơn online</button>
				@elseif( $i-> type == 2 )

				    <button type="" class="btn-warning border-0" style="border-radius: 3px">Bán tại cửa hàng</button> 
				@endif
				</td>

				<td align="center">
					<a href="{{ route('backend.order-detail',['id'=> $i->id]) }}" title="Xem đơn hàng">
						<span class="label label-success"> Chi tiết</span>
					</a>

					<!-- <a href="{{ route('backend.order-delete',['id'=> $i->id]) }}" title="Xóa đơn hàng" 
						onclick="return confirm('Bạn muốn xóa đơn hàng này')">
						<span class="label label-danger btn-del"> Xóa</span>
					</a> -->
				</td>
			</tr>
		@endforeach
		</tbody>

	</table>
	<div class="text-center">
		{{ $ordercomfirm->links() }}		
    </div>
</div>

<script src="{{ url('/') }}/public/backend/js/ajax/ajax-orders.js"></script>

@stop()
