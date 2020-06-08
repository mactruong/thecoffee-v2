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

    .btn-acive {
     	background-color: #ea8025;
     	border: 0;
     	padding: 8px 12px;
     	border-radius: 4px;
     	color: #ffffff;
    }

    .btn-acive a {
      color: #ffffff;
      text-transform: uppercase;
      text-decoration: none
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
          <td height="10">
            
          </td>
        </tr>

    		<tr>
  				<td>
  					Chào mừng bạn <b>{{$user->full_name}} </b> đến với cửa hàng của chúng tôi. 
  				</td>
			  </tr>

        <tr>
          <td>
            Mã kích hoạt tài khoản của bạn là : <b style="font-size: 18px"> {{$code}}</b>
          </td>
        </tr>

			<tr>
				<td>
				  Vui lòng điền mã kích hoạt vào link dưới đây để kích hoạt tài khoản và trở thành khách hàng của THE COFFEE
				</td>
			</tr>

			<tr>
				<td height="20">
					
				</td>
			</tr>
			<tr>
				<td>
					
					<button type="submit" class="btn-acive"><a href="http://localhost:8380/thecoffee/active-user/{{$id}}"> Kích hoạt</a></button>
					
				</td>	
			</tr>

            <tr>
                <td height="50">
                  
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
                <td>The Coffee</td>
            </tr>
        </tbody>
    </table>

</body>
</html>