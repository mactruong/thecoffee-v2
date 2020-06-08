@extends('layouts.backend')
@section('box-body')
@section('box-title','Thống kê')

<div class="container-fluid main">			

	@for($i = 1; $i< 13;$i++)

	<p class="hidden" id="online-{{$i}}">{{$orderOnline[$i]}}</p>
	<p class="hidden" id="store-{{$i}}">{{$orderStore[$i]}}</p>
	
	@endfor

	<div class="row">

 	@if(!($admin->role_key == 'manage_info'))

		<div class="col-xs-12 col-md-6 col-lg-4">
			<a href="{{ route('backend.order')}}" title="Tổng đơn hàng">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$order_count}}</div>
							<div class="text-muted">Tổng đơn hàng đã bán</div>
						</div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-4">
			<a href="{{ route('backend.order-pending')}}" title="Danh sách đơn hàng đang chờ xử lý">
				<div class="panel panel-red panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$order_comfirm}}</div>
							<div class="text-muted"> Đơn hàng đang chờ xử lý</div>
						</div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-4">
			<a href="{{ route('backend.user')}}" title="Danh sách khách hàng">
				<div class="panel panel-teal panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$customer_count}}</div>
							<div class="text-muted">Tài khoản khách hàng</div>
						</div>
					</div>
				</div>
			</a>
		</div>

	@endif()

	@if(!($admin->role_key == 'manage_sale'))		

		<div class="col-xs-12 col-md-6 col-lg-4">
			<a href="{{ route('backend.category')}}" title="Danh mục">
				<div class="panel panel-orange panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$category_count}}</div>
							<div class="text-muted"> Danh mục</div>
						</div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-4">
			<a href="{{ route('backend.products')}}" title="Sản phẩm">
				<div class="panel panel-blue panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked paper coffee cup"><use xlink:href="#stroked-paper-coffee-cup"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$products_count}}</div>
							<div class="text-muted">Sản phẩm</div>
						</div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-4">
			<a href="{{ route('backend.news')}}" title="Blog">
				<div class="panel panel-success  panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$news_count}}</div>
							<div class="text-muted">Bài viết</div>
						</div>
					</div>
				</div>
			</a>
		</div>

	@endif()	
		
		</div>
		
		<div class="row">
			<div class="col-lg-9">
				<div class="panel panel-default">
					<div class="panel-heading">Biểu đồ bán hàng năm 2020</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="100" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-heading">Chú thích</div>
					<div class="panel-body">
						<div class="">
							<div class="col-lg-12">
								<div class="col-md-10 note-title">Đơn online</div>
								<div class="col-md-2"><span class="glyphicon glyphicon-minus note-icon note-icon--red"></span></div>
							</div>
							<div class="col-lg-12">
								<div class="col-md-10 note-title">Đơn bán tại cửa hàng </div>
								<div class="col-md-2"><span class="glyphicon glyphicon-minus note-icon note-icon--blue"></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Cafe đã bán</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="25" ><span class="percent">25%</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Sản phẩm khác đã bán</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="30" ><span class="percent">30%</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Đánh giá</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="56" ><span class="percent">56%</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Băng thông truy cập</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	@stop()