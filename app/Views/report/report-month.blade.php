@extends('layouts.backend')
@section('title','/ BÁO CÁO')
@section('box-title','Báo cáo thống kê hàng tháng')
@section('box-body')
    
    <div class="container-fluid main min-height-100">	
	        
        <h3 class="text-center">Báo cáo bán hàng của tháng
	         <b>
	         	@if(!$month)
	    	 	   <?php  echo date("m/Y") ?> 
	    	 	@else 
	    	 	   {{$month}}/<?php  echo date("Y") ?> 
	    	 	@endif
		    </b>
	    </h3>


	    <div class="row d-flex justify-content-center">
            
				<div class="col-xs-12 col-md-4 col-lg-4">
					
					<div class="panel panel-orange panel-widget ">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large">{{number_format($order->sum('sum'),0,'','.')  }} vnđ </div>
								<div class="text-muted">Tổng doanh thu</div>
							</div>
						</div>
					</div>
					
				</div>

				<div class="col-xs-12 col-md-4 col-md-4">
					
					<div class="panel panel-success panel-widget ">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large">{{count($order) }}</div>
								<div class="text-muted">Tổng đơn hàng</div>
							</div>
						</div>
					</div>
					
				</div>

				<div class="col-xs-12 col-md-4 col-lg-4">
					
					<div class="panel panel-teal panel-widget ">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large"></div>
								<div class="text-muted">Nhân viên xuất sắc</div>
							</div>
						</div>
					</div>
					
				</div>

		</div>

		<form action="{{ route('backend.report-month-search')}}" method="GET" role="form">
				<div class="row d-flex align-items-end">
					<div class="col-md-4">
						<div class="wrapper-datepicker custom-datepicker ">
							<label for="datepicker">Chọn tháng:</label><br/>
							<select name="month" id="" class="form-control select-width" required>
								<option value="">Chọn tháng</option>

								<?php
								    for($i = 1; $i < 13; $i++) {
								        echo "<option value='$i'>Tháng $i</option>";
								    }
								?>
							
						    </select>
						</div>
					</div>

					<div class="col-md-4 button-search-day">
						
						<button type="submit" class="btn btn-info height-35"><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button>
					</div>

			    </div>
		    </form>	

		    @if(count($order))
	    	 
	    	 	<div class="d-flex justify-content-end">
	    	    	<button class="btn btn-success height-35" id="saveAsExcel">
	    	    		<i class="fa fa-print" aria-hidden="true"></i> Xuất excel báo cáo
	    	    	</button>
	    	    </div> <br/>

	    	    <h4>Danh sách đơn hàng:</h4> <br/>

			    <table class="table table-hover" id="list-order-day">
					<thead>

						<tr >
							<td colspan="7" align="center" class="border-0">
								<div class="d-none">
									BÁO CÁO BÁN HÀNG THÁNG {{$month}}/<?php  echo date("Y") ?> :
								
								</div>
				    	   	</td>
						</tr>

						<tr></tr>

						<tr>
							<td colspan="7" class="border-0">
								<div class="d-none">
									Danh sách đơn hàng:
								</div>
				    	   	</td>
				    	</tr>

				    	<tr></tr>

						<tr>
							<th class="text-center">Mã</th>
							<th>Khách hàng</th>
							<th>Thông tin đơn hàng</th>
							<th>Tổng đơn hàng</th>
							<th>Loại đơn</th>
							<th>Nhân viên lập</th>
							<th class="text-center">Tác vụ</th>
						</tr>
					</thead>
 
					<tbody>

						@foreach ($order as $i)

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
									 {{$pro->name}} - Số lượng: {{$id->quantity}}<br>
								@endforeach
							</td>

							<td>{{number_format($i->sum,0,'','.')}}đ</td>

 							<td>
							@if( $i-> type == 1 )
							    <button type="" class="btn-primary" style="border:0; border-radius: 3px">Đơn online</button>
							@elseif( $i-> type == 2 )
							    <button type="" class="btn-warning" style="border:0; border-radius: 3px">Bán tại cửa hàng</button> 
							@endif
							</td>
							
							<td>
								{{ $i->admin_name }}
							</td>

							<td align="center">
								<a href="{{ route('backend.order-detail',['id'=> $i->id]) }}" title="Xem đơn hàng"><span class="label label-success">Chi tiết</span></a>
							</td>

						</tr>
						
					@endforeach

					    <tr></tr>
					   
					    <tr></tr>
					  
						<tr>
							<td colspan="7" align="right" class="border-0">
								<div class="d-none">
									Tổng đơn hàng: {{count($order) }} đơn
								</div>
							</td>
						</tr>

						<tr>
							<td colspan="7" align="right" class="border-0">
								<div class="d-none">
									Tổng tiền: {{number_format($order->sum('sum'),0,'','.')  }} vnđ
								</div>
							</td>
						</tr>

					</tbody>

				</table>

				<div class="text-center">
					{{ $order->links() }}		
			    </div>
			</div>

		@else 
	        <div class="text-center m-t-30">
	          	<img src="{{ url('/')}}/public/images/essay-empty.png" width="100"> <br/><br/>
	          	Không có đơn hàng nào!
	        </div>
		@endif

		
	</div>

	<script src="{{ url('/') }}/public/backend/js/ajax/ajax-orders.js"></script>
@stop
