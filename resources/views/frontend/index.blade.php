@extends('layouts.index')

@section('main')

	<div class="main">
	
		<div class="row banner">
			<div class="col-lg-7 col-md-7 slide">
				<div id="carousel-id" class="carousel slide my-slide" data-ride="carousel">

					<ol class="carousel-indicators">
						<li data-target="#carousel-id" data-slide-to="0" class="slide-1"></li>
						<li data-target="#carousel-id" data-slide-to="1" class="slide-1"></li>
						<li data-target="#carousel-id" data-slide-to="2" class="active slide-1"></li>
						<li data-target="#carousel-id" data-slide-to="3" class="slide-1"></li>
					</ol>

					<div class="carousel-inner my-carousel">
						<div class="item my-item">
							<img src="{{ url('/') }}/public/images/{{ $banner->image1}}">
						</div>
						<div class="item my-item">
							<img src="{{ url('/') }}/public/images/{{ $banner->image2}}">
						</div>
						<div class="item my-item">
							<img src="{{ url('/') }}/public/images/{{ $banner->image3}}">
						</div>
						<div class="item active my-item">
							<img src="{{ url('/') }}/public/images/{{ $banner->image4}}">
						</div>
					</div>

					<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>

				</div>					
			</div>

			<div class="col-lg-5 col-md-5 content">
				<h2>{{ $banner->title}}</h2>
				<p>{{ $banner->descriptions}}</p>
			</div>
		</div>

		<div class="container">
			
			<div class="title">
				<h1> Menu </h1>
			</div>

			<div class="row">

				@foreach($products as $pro)

				<div class="col-lg-4 col-sm-4 col-xs-6 product">
					<div class="image">
						<a href=""> <img src="{{ url('/') }}/public/images/{{ $pro->image }}" alt="" title=" {{ $pro->name }} "></a>

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
		</div>

		<div class="blog">
			<div class="container">	

				<div class="title">
					<h1> Blog </h1>
				</div>

				<div class="row">

					@foreach($newFirst as $news)

					<div class="col-lg-5 col-sm-5 col-xs-6 new-blog">
						<div class="image">
							<a href="" title="{{ $news->title }}"> <img src="{{ url('/') }}/public/images/{{ $news->images }}" alt=""></a>

						</div>

						<div class="content">						
							<a href="{{route('bai-viet',['slug'=>$news->slug])}}"><h2> {{ $news->title }}</h2></a>							
							<p>{{ $news-> short_content }}..</p>
							<a href="{{route('bai-viet',['slug'=>$news->slug])}}"><button type="">Xem thêm</button></a>
						</div>
					</div>

					@endforeach()

					@foreach($newSecond as $blog)

					<div class="col-lg-7 col-sm-7 col-xs-6 new-blog">
						<div class="image">
							<a href="" title="{{ $blog->title }}"> <img src="{{ url('/') }}/public/images/{{ $blog->images }}" alt=""></a>
						</div>

						<div class="content">						
							<a href="{{route('bai-viet',['slug'=>$blog->slug])}}"><h2> {{ $blog->title }}</h2></a>	
							<p>{{ $blog-> short_content }}..</p>
							<a href="{{route('bai-viet',['slug'=>$blog->slug])}}"><button type="">Xem thêm</button></a>

						</div>
					</div>

					@endforeach()

					@foreach($listNews as $news)

					<div class="col-lg-4 col-sm-4 col-xs-6 new-blog">
						<div class="image">
							<a href="" title="{{ $news->title }}"> <img src="{{ url('/') }}/public/images/{{ $news->images }}" alt=""></a>
						</div>

						<div class="content">						
							<a href="{{route('bai-viet',['slug'=>$news->slug])}}"><h2> {{ $news->title }}</h2></a>	
							<p>{{ $news-> short_content }}..</p>
							<a href="{{route('bai-viet',['slug'=>$news->slug])}}"><button type="">Xem thêm</button></a>			
						</div>
					</div>

					@endforeach()

				</div>
			</div>
		</div>
	</div>

@stop()

