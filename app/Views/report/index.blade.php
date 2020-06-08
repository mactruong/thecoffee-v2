@extends('layouts.backend')
@section('title','/ BÁO CÁO')
@section('box-title','Báo cáo thống kê')
@section('box-body')
    
    <div class="container-fluid main min-height-100">	
		<div class="row d-flex justify-content-center m-t-50">

			<div class="col-xs-12 col-md-6 col-lg-4">
				<a href="{{ route('backend.report-day')}}" title="BÁO CÁO HÀNG NGÀY">
					<div class="panel panel-blue panel-widget ">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right d-flex justify-content-center align-items-center">
								<div>BÁO CÁO HÀNG NGÀY</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-4">
				<a href="{{ route('backend.report-month')}}" title="BÁO CÁO THEO THÁNG">
					<div class="panel panel-teal panel-widget ">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right d-flex justify-content-center align-items-center">
								<div>BÁO CÁO THEO THÁNG</div>
							</div>
						</div>
					</div>
				</a>
			</div>

	    </div>

	    @for($i = 1; $i< 13;$i++)

			<p class="hidden" id="online-{{$i}}">{{$orderOnline[$i]}}</p>
			<p class="hidden" id="store-{{$i}}">{{$orderStore[$i]}}</p>
		
		@endfor


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

	</div>
    

    <script src="{{ url('/') }}/public/backend/js/ajax/ajax-orders.js"></script>
@stop
