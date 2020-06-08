@extends('layouts.index')

@section('main')

	<div class="container detail-pro">
		
		
		<h4 class="text-uppercase"> MENU / <a href="{{route('category',['slug'=>$pro->category_slug])}} ">{{ $pro->category_name }} </a>/ {{ $pro->name }} </h4>

		<div class="row mobile-center">	

			<div class="col-lg-6 col-sm-6 col-xs-12 product">
				<a href=""><img src=" {{ url('/') }}/public/images/{{ $pro-> image }}" alt="" title="{{ $pro->name}}"></a>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-9 info-pro">
				<h2>{{ $pro->name}}</h2>
				<p  class="resource"> {{ $pro-> review }}</p>
				<p class="price"> {{ number_format($pro->price,0,'',',')}} Đ</p>
				<a href="{{route('add-cart',['id'=>$pro->id])}}">  <button type="">Đặt ngay</button></a>
				<p> Gọi để được giao tận nơi <a href="">1900 000</a> </p>
			</div>
		</div>
		
	</div>

 @if(count($productslike))

	<div class="product-like">
		<div class="container">		
			<h1> Có thể bạn cũng thích</h1>		
			<div class="row ">

				@foreach($productslike as $prolike)

				<div class="col-lg-4 col-sm-4 col-xs-6 product">
					<div class="image">
						<a href=""> <img src="{{ url('/') }}/public/images/{{ $prolike-> image }}" alt="" title="{{ $prolike->name }}"></a>
						<div class="sale">
							<p>{{ $prolike->promo }}</p>	
						</div>
					</div>

					<div class="info">
						<h3> <a href="{{route('product',['slug'=>$prolike->slug])}}"> {{ $prolike->name }} </a> </h3>
						<p class=price >{{ number_format($prolike->price,0,'',',')}} Đ</p>
						<div class="buy">
							<a href="{{route('add-cart',['id'=>$prolike->id])}}"> <button type="" class="buy-now">Đặt Ngay</button></a>
							<a href="{{route('product',['slug'=>$prolike->slug])}}"><button type="">Tìm hiểu thêm</button></a>
						</div>
					</div>

				</div>

				@endforeach()

			</div>
		</div>
	</div>
@endif()

@stop()