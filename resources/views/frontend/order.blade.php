@extends('layouts.index')
@section('main')

	<div class="container view-cart">
        <h4> THE COFFEE / ĐẶT HÀNG</h4>

		<div class="row">
			<div class="col-md-7">

			<form action="" method="POST" role="form">
					<legend>Thông tin mua hàng</legend>
					<table>
						<tbody>

							<tr>
								<td class="td1">
									<p for="">Họ tên nguời nhận <span class="color-red">*</span></p>
								</td>

								<td class="td2">
									<input type="text" class="form-control" name="receiver_name" value="{{ Auth::user()->full_name }}" id="full_name">
								</td>
							</tr>

							<tr>
								<td class="td1">
									<p for="">Email <span class="color-red">*</span></p>
								</td>

								<td class="td2">
									<input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" id="email1">
								</td>
							</tr>

							<tr>
								<td class="td1">
									<p for="">Số điện thoại <span class="color-red">*</span></p>
								</td>
								<td class="td2">
									<input type="number" class="form-control" name="receiver_phone" value="{{ Auth::user()->phone }}" id="phone">
								</td>
							</tr>

							<tr>
								<td class="td1">
									<p for="">Địa chỉ <span class="color-red">*</span></p>
								</td>

								<td class="td2">
									<input type="text" class="form-control" name="receiver_address" value="{{ Auth::user()->address }}" id="address">
								</td>
							</tr>
							
							<tr>
								<td class="td1"><p for="">Ghi chú</p></td>
								<td class="td2"><textarea name="note"></textarea></td>
							</tr>
						</tbody>
					</table>
				
		
			</div>

			<div class="col-md-5 m-m-t-30">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Đơn hàng</h3>
					</div>

					<div class="panel-body">

							<table class="table table-hover">
								<thead>
									<th>Sản phẩm</th>
									<th class="text-center">Ảnh</th>
									<th class="text-center">Số lượng</th>
									<th class="text-right">Thành tiền</th>
								</thead>

								<tbody>
									@if(!empty($cart->items))

									@foreach($cart->items as $ca)	

									<tr>
										
										<td>
											<h5>{{ $ca['name'] }}</h5>
											Giá: 
											{{ number_format($ca['price'],0,'','.') }}
										</td>
										<td class="text-center" width="130px"><img src="{{ url('/') }}/public/images/{{ $ca['image'] }}" alt="" style="width: 50px; height: 50px;"></td>
										<td class="text-center">
											<h5>{{ $ca['quantity'] }}</h5>
										</td>
										<td class="text-right"><h5>{{ number_format($ca['quantity']*$ca['price'],0,'','.') }}</h5></td>
									</tr>

									@endforeach

									@endif

									<tr>
										<td>Tổng:</td>
										<td></td>
										<td></td>
										<td class="text-right">{{ number_format($cart->total(),0,'','.') }} vnđ</td>
									</tr>

									<tr>
										<td>Phí vận chuyển:</td>
										<td></td>
										<td></td>
										<td class="text-right">0</td>
									</tr>

									<tr>
										<td style="font-size: 20px;">Thanh toán:</td>
										<td></td>
										<td></td>
										<td class="text-right font-weight-bold" style="font-size: 20px;">{{ number_format($cart->total(),0,'','.') }} vnđ</td>
									</tr>

								</tbody>
							</table>

							<div>
								<a href="{{route('view-cart')}}" style="margin: 10px; float: left; display: inline-block;" >Quay về giỏ hàng</a>

								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<button type="submit" class="btn btn-order" >Đặt hàng</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>

@stop()