<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Mail</title>
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta name="author" content="">
  <meta name="GENERATOR" content="MSHTML 11.00.9600.18838">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <meta name="format-detection" content="date=no">
  <meta name="format-detection" content="address=no">
  <meta name="format-detection" content="email=no">
  <style type="text/css">
     .list-product th, .list-product td{
     	border: 1px solid #f1f1f1;
     	padding: 5px;
     }

     .list-product .thead th {
     	background-color: rgba(234, 128, 37, 0.3);
     }
  </style>
</head>
<body id="body">

    <table  width="900" align="center" cellpadding="0" cellspacing="0" border="0">
    	
    	<tbody>
    		<tr>
    			<td height="20"></td>
    		</tr>

    		<tr>
    			<td>
    				<b style="color: #ea8025; font-size: 16px">THE COFFEE</b> xin chào!
    			</td>
    		</tr>

    		<tr>
				<td>
					Cảm ơn {{$name}}đã sử dụng dịch vụ của cửa hàng. 
				</td>
			</tr>

			<tr>
				<td>
				  Cửa hàng xin gửi bạn thông tin chi tiết đơn hàng mà bạn đã đặt vào lúc: <b>{{ date('H:i:s, d/m/Y ', strtotime(' + 7 hours')) }}</b>
				</td>
			</tr>

			<tr>
				<td height="20">
					
				</td>
			</tr>

			<tr>
				<td>
					* Người nhận: <b style="font-size: 13px">{{$receiver->receiver_name}} </b> 
				</td>
			</tr>
				
			<tr>
				<td>
					* Điện thoại: <b style="font-size: 13px">{{$receiver->receiver_phone}} </b>
				</td>	
			</tr>

			<tr>
				<td>
					* Địa chỉ: <b style="font-size: 13px">{{$receiver->receiver_address}}</b>
				</td>	
			</tr>

			<tr>
				<td>
					* Ghi chú: <b style="font-size: 13px">{{$receiver->note}} </b>
				</td>	
			</tr>

			<tr>
				<td>
					* Thông tin sản phẩm: </b>
				</td>	
			</tr>

			<tr>
				<td height="20">
				</td>	
			</tr>
    	</tbody>
    </table>

	<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
		<tbody>
			<tr>
				<td width="600" align="center" valign="top">
					
					<table align="center"  width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width:600px;">
						<tbody>
						    <tr>
						    	<td>
						    		<table align="center"  class="list-product" width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width:600px;">
								        <tr class="thead">
								            <th>STT</th>
								            <th>Tên sản phẩm</th>
								            <th>Số lượng</th>
								            <th>Đơn giá</th>
								            <th>Thành tiền</th>
								        </tr>
								        
								        <tbody>
											@php $stt = 1; @endphp
											@foreach($cart->items as $item)
											@php
											$tt = $item['quantity']*$item['price']; 
											@endphp
											<tr>
												<td align="center">{{ $stt }}</td>

												<td align="center" style="text-transform: uppercase;">{{ $item['name'] }}</td>
											
												<td align="center">
													{{$item['quantity']}}
												</td>

												<td align="center">
													{{ number_format($item['price'],0,'','.') }}
												</td align="center">

												<td align="center">{{ number_format($tt,0,'','.') }}đ</td>
											</tr>
											 @php $stt++ @endphp
											@endforeach

										</tbody>

										 <tfoot>
						                    <tr>
						                        <th colspan="4" style="text-align: center">Tổng tiền</th>
						                        <th colspan="4" align="center" style="font-size: 16px">{{number_format($cart->total(),0,'','.')}} vnđ
						                        </th>
						                    </tr>
						                </tfoot>
								    </table>
						    	</td>
						    </tr>

						    <tr>
						    	<td height="50">
						    		
						    	</td>
						    </tr>

						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>

	<table width="900" align="center" cellpadding="0" cellspacing="0" border="0">
		<tbody>
			 <tr>
		    	<td>
		    		Mọi thông tin xin liên hệ với cửa hàng:
		    	</td>
		    </tr>

		    <tr>
		    	<td>
		    		Số điện thoại: {{$aboutUs->phone}}
		    	</td>
		    </tr>

		    <tr>
		    	<td>
		    		Địa chỉ: {{$aboutUs->address}}
		    	</td>
		    </tr>

		    <tr>
		    	<td>
		    		Website: <a href="http://localhost:8380/thecoffee/" style="color: #ea8025;">www.thecoffee.com.vn</a>
		    	</td>
		    </tr>

 			<tr>
		    	<td height="30">
		    	</td>
		    </tr>

			<tr>
				<td>Cảm ơn bạn!,</td>
			</tr>

			<tr>
				<td>The coffee</td>
			</tr>
		</tbody>
	</table>
</body>
</html>