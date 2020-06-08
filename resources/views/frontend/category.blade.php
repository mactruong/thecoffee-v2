@extends('layouts.index')

@section('main')

	<div class="product-like">
		<div class="container">	
			<h4>The coffee / Danh mục / {{ $category->name}} </h4>
			
			<div class="row ">

				@foreach($product as $pro)

				<div class="col-lg-4 col-sm-4 col-xs-6 product">
					<div class="image">
						<a href=""> <img src="{{ url('/') }}/public/images/{{ $pro-> image }}" alt="" title="{{ $pro->name }}"></a>
					</div>

					<div class="info">
						<h3> <a href="{{route('product',['slug'=>$pro->slug])}}"> {{ $pro->name }} </a> </h3>
						<p class=price >{{ number_format($pro->price,0,'',',')}} Đ</p>
						<div class="buy">
							<a href="{{route('add-cart',['id'=>$pro->id])}}"> <button type="" class="buy-now">Đặt Ngay</button></a>
							<a href="{{route('product',['slug'=>$pro->slug])}}"><button type="">Tìm hiểu thêm</button></a>
						</div>
					</div>

				</div>

				@endforeach()

			</div>
		</div>
	</div>
	
@stop()