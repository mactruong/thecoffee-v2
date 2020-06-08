@extends('layouts.index')
@section('main')

<div class="menu-page">

	<div class="container">
	<h4> THE COFFEE / MENU </h4>
	
	<div class="row">
		<div class="col-lg-3 col-md-3 menu-page__list">

			<ul class="list-category">

				@foreach($cat as $cat)

				<li class="js-item-menu" data-id="#{{$cat->slug}}">{{$cat->name}}</li>

				@endforeach()

			</ul>

		</div> 
		<div class="col-lg-9 col-md-9 list-product" >

			<?php $cate =DB::Table('category')->get() ?>
             @foreach($cate as $cate)

             <div class="menu__title" id="{{$cate->slug}}">
             	 <h3>{{$cate->name}}</h3>
             </div>

             <div class="row">

             <?php  $product = DB::Table('products')->where('products.cat_id',$cate->id)->get(); ?>
				@foreach($product as $pro)

				<div class="col-lg-4 col-sm-4 col-xs-6 product">
					<div class="image">
						<a href=""> <img src="{{ url('/') }}/public/images/{{ $pro-> image }}" alt="" title=" {{ $pro->name }} " style="width: 100%"></a>

						<div class="sale">
							<p>{{ $pro->promo }}</p>	
						</div>
					</div>

					<div class="info">
						<h3> <a href="{{route('product',['slug'=>$pro->slug])}} " title=" {{ $pro->name }} "> {{ $pro->name }} </a> </h3>

						<p class=price >{{ number_format($pro->price,0,'',',')}} Đ</p>

						<div class="buy">
							<a href="{{route('add-cart',['id'=>$pro->id])}}"><button type="" class="buy-now">Đặt Ngay</button></a>
							<a href="{{route('product',['slug'=>$pro->slug])}}" class="view"><button type="">Tìm hiểu thêm</button></a>
						</div>
					</div>
				</div>

				@endforeach()

             </div>

            @endforeach()

		</div> 

	</div>

</div>
</div>


@stop()