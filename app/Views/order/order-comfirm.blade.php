@extends('layouts.backend')
@section('title','/ ĐƠN HÀNG')
@section('box-title','Danh sách đơn hàng mới')
@section('box-body')

<div class="tab-content">
	@if(count($order))
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Khách hàng</th>
					<th>Thông tin đơn hàng</th>
					<th>Tổng đơn hàng</th>
					<th>Ngày đặt</th>
					<th class="text-center">Trạng thái</th>
					<th class="text-center">Tác vụ</th>
				</tr>
			</thead>

			<tbody >
				
			@foreach ($order as $i)
				<?php 
					$i_detail = DB::table('order_detail')->where('order_id',$i->id)->get();
				 ?>
				<tr>
					<td>{{ $i->id }}</td>
					<td>{{ $i->user_name }}</td>
					<td>
						@foreach($i_detail as $id)
							<?php 
								$pro = DB::table('products')->where('id',$id->pro_id)->first();
							 ?>
							 {{$pro->name}} - Số lượng: {{$id->quantity}}<br>
						@endforeach
					</td>

					<td>{{number_format($i->sum,0,'','.')}}đ</td>
					<td>{{ date('H:i:s, d-m-Y ', strtotime($i->created_at . ' + 7 hours')) }}</td>

				
					<td align="center"> 
						<button type="" class="btn-info" style="border:0; border-radius: 3px"> Đang chờ xử lý</button>
					</td>

					<td align="center">
						<a href="{{ route('backend.order-detail',['id'=> $i->id]) }}" title="Xem đơn hàng"><span class="label label-success"> Chi tiết</span></a>

					<!-- 	<a href="{{ route('backend.order-delete',['id'=> $i->id]) }}" title="Xóa đơn hàng" onclick="return confirm('Bạn muốn xóa đơn hàng này')"><span class="label label-danger btn-del">Xóa</span></a> -->
					</td>
				</tr>
			    @endforeach
			</tbody>
		</table>
		<div class="text-center">
			{{ $order->links() }}		
		</div>
	@else 
        <div class="text-center m-t-30">
          	<img src="{{ url('/')}}/public/images/essay-empty.png" width="100"> <br/><br/>
          	Không có đơn hàng nào!
        </div>
	@endif	
	
</div>


@stop()
