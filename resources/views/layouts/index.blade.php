<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>The Tarot Cafe</title>
	<!-- <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300&display=swap |Roboto:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ url('/') }}/public/css/style.css">
	<link rel="stylesheet" href="{{ url('/') }}/public/css/responsive.css">
	
</head>
<body>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2"></script>
	<header>
		<div class="menu-header">

			<div class="container">
				<div class="menu">
					<ul class="menu-cart">
						<li class="cart">
							<a href=" {{route('view-cart')}}" title="Giỏ hàng">
								<i class="fa fa-shopping-bag"></i>
							</a>

							<div class="count-pro" >
								<span>{{ $cart->quanti()}}</span>
							</div>
						</li>

					</ul>

					<div class="logo">
						<p> <a href="{{ route('home') }}" >THE COFFEE  </a></p>
					</div>

					<button class="menu-btn" type="button">
					 	<i class="fa fa-bars icon-mobile" aria-hidden="true"></i>
					</button>	

					<ul class="list-menu">

						<li>
							<a href="{{route('menu')}}">Menu</a>
						</li>
						<li class="menu-drop"> 
							<a>Danh mục
								<ul class="menu-dropdown" >
									<?php $cat=DB::Table('category')->get() ?>

									@foreach($cat as $cat)
									<li>
										<a href="{{route('category',['slug'=>$cat->slug])}}">{{$cat->name}}</a>
									</li>
									@endforeach
								</ul>
							</a>
						</li>

						<li>
							<a href="{{route('bai-viet',['cau-chuyen-thuong-hieu'])}}">Câu chuyện thương hiệu</a>
						</li>

						<li>
							<a href="{{route('bai-viet',['cau-chuyen-ca-phe'])}}">Câu chuyện cà phê</a>
						</li>

						<li>
							<a href=""> Ưu đãi thành viên</a>
						</li>

						<li>
							<a href="{{route('blog')}}">bài viết</a>
						</li>

					<li class="login ">

						@if(Auth::check() && Auth::user() )

						<a>Xin chào  {{ Auth::user()->full_name }} </a>

						<ul class="dropdown-login">
							<li class="border-0">
								<a href="{{route('profile')}}">
									<i class="fa fa-address-book p-r-10" aria-hidden="true"></i>
										Xem trang cá nhân
								</a>
							</li>
							<li class="border-0">
								<a href="{{route('history-order')}}">
									<i class="fa fa-align-right p-r-10" aria-hidden="true"></i>
										Đơn hàng đã đặt
								</a>
							</li>
							<li class="border-0">
								<a href="{{route('logout')}}">
								 	<i class="fa fa-sign-out p-r-10" aria-hidden="true"></i>
								  	Đăng xuất
								</a>
							</li>
						</ul>
					</li>

					@else

					<a href="{{route('login')}}" title="">Đăng nhập</a>

					@endif

					<li class="cart">
						<a href=" {{route('view-cart')}}" title="Giỏ hàng">
							<i class="fa fa-shopping-bag"></i>
						</a>

						<div class="count-pro" >
							<span>{{ $cart->quanti()}}</span>
						</div>
					</li>

				</ul>

			</div>
		</div>
	</div>


	<div  class="list-menu-mobile">	
		<ul class="menu-mobile">
			<li>
				<a href="{{route('menu')}}">Menu</a>
			</li>

			<li class="menu-mobile-drop">
				 <a> Danh mục 
				 	<img src="{{ url('/') }}/public/images/black.png" alt="" class="img-caret">
					<ul class="menu-mobile-dropdown">

						<?php $cat=DB::Table('category')->get() ?>

						@foreach($cat as $cat)

						<li>
							<a href="{{route('category',['slug'=>$cat->slug])}}">{{$cat->name}}</a>
						</li>

						@endforeach
					</ul>
				</a>
			</li>

			<li>
				<a href="{{route('bai-viet',['cau-chuyen-thuong-hieu'])}}">Câu chuyện thương hiệu</a>
			</li>

			<li>
				<a href="{{route('bai-viet',['cau-chuyen-ca-phe'])}}">Câu chuyện cà phê</a>
			</li>
			
			<li><a href=""> Ưu đãi thành viên</a></li>
			<li><a href="{{route('blog')}}">BÀI VIẾT</a></li>

			<li class="menu-mobile-user">

				@if(Auth::check() && Auth::user())

					<a>Xin chào   {{ Auth::user()->full_name }} </a>
					<img src="{{ url('/') }}/public/images/black.png" alt="" class="img-caret">

					<ul class="menu-mobile-logout">
						<li>
							<a href="{{route('profile')}}">
							<i class="fa fa-address-book p-r-10" aria-hidden="true"></i>
								Xem trang cá nhân
							</a>
						</li>

						<li class="border-0">
							<a href="{{route('history-order')}}">
								<i class="fa fa-align-right p-r-10" aria-hidden="true"></i>
								Đơn hàng đã đặt
							</a>
						</li>

						<li class="border-0">
							<a href="{{route('logout')}}">
								<i class="fa fa-sign-out p-r-10"></i> 
								Đăng xuất
							</a>
						</li>
					</ul>
			</li>

				@else

				<a href="{{route('login')}}" title="">Đăng nhập</a>

				@endif

		</ul>
	</div>

</header>

@yield('main')

<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-sm-3 col-xs-6">
				<h3><a href="{{ route('home') }}"> THE COFFEE </a> </h3>
			</div>

			<div class="col-lg-3 col-sm-3 col-xs-6">
				<h3>About</h3>

				<ul>
					<li> <a href="">về chúng tôi</a> </li>
					<li><a href="">câu chuyện cà phê</a> </li>
					<li> <a href="">tin tức tuyển dụng</a> </li>
					<li><a href="">hệ thống cửa hàng</a> </li>
				</ul>

			</div>

			<?php $aboutUs=DB::Table('about_us')->first() ?>

			<div class="col-lg-3 col-sm-3 col-xs-6">
				<h3>Address</h3>

				<ul>
					<li>
					    <i class="fa fa-map-marker"></i>
						<a href="{{$aboutUs->link_map}}">
							{{$aboutUs->address}}
						</a> 
					</li>

					<li> thời gian mở cửa: </li>
					<li>{{$aboutUs->time_work}}</li>				    
				</ul>
			</div>

			<div class="col-lg-3 col-sm-3 col-xs-6">
				<h3>Contact</h3>
				<ul>
					<li>Hotline:<a href=""> {{$aboutUs->phone}}</a> </li>

					<li>
						email: <a href="">
							<span class="text-lowercase">{{$aboutUs->email}}</span> 
						</a>
					</li>	

					<li>
						<a href="{{$aboutUs->link_fb}}"> 
							<img src="http://dingtea.vn/images/ft-facebook.png" alt="" width="20px" height="20px"> 
						</a>

						<a href="{{$aboutUs->link_instagram}}">
							<img src="http://dingtea.vn/images/ft-instagram.png" alt="" width="20px" height="20px" class="m-l-10"> 
						</a>

						<a href="{{$aboutUs->link_youtube}}"> 
							<img src="{{ url('/') }}/public/images/twitter.png" width="20px" height="20px" class="m-l-10">
						</a>
					</li>
				</ul>
			</div>
		</div>

		<hr>

		<div>
			<p>Copyright © 2018 THE COFFEE. Desgin by Dang Truong</p> 
		</div>
		
	</div>
</footer>

<div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon">
	<div class="phonering-alo-ph-circle"></div>
	<div class="phonering-alo-ph-circle-fill"></div>
	<a href="tel:+84988888888" class="pps-btn-img" title="Đặt ngay">
		<div class="phonering-alo-ph-img-circle"></div>
	</a>
</div>

<div class='lentop'>
	<div>
		<img src='https://1.bp.blogspot.com/-k6sikOdzFXQ/VwqCKDosmEI/AAAAAAAAKxE/nLxLhkTIO6o3iE5ZWmtxo2bf4QHdzPQNQ/s1600/top.png'/>
	</div>
</div>


</body>

<script src="http://code.jquery.com/jquery.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Bootstrap JavaScript -->
<script src="{{ url('/') }}/public/js/ajax.js"></script>
<!-- Thông báo success -->

@if(Session::has('success'))
<div class="modal fade" id="modal-id">
	<div class="alert alert-success text-center">
		<strong>{!! Session::get('success') !!}</strong> .
	</div>
</div>

<script type="text/javascript">
	$('#modal-id').modal('show');

</script>

@endif

@if(Session::has('error'))
<div class="modal fade" id="modal-error">
	<div class="alert alert-danger text-center">
		<strong>{!! Session::get('error') !!}</strong> .
	</div>
</div>

<script type="text/javascript">
	$('#modal-error').modal('show');
</script>
@endif
</html>