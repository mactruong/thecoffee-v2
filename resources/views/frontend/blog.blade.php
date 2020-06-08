@extends('layouts.index')

@section('main')

<div class="container detail-blog mr-top">
	<h4> THE TAROT COFFEE / BÀI VIẾT </h4>
	<div class="list-news row">
		@foreach( $news as $news )
		<div class="col-lg-4 col-sm-6 col-xs-12 ">
			<div class="news-item">
				<div class="blog-like">
					<img src="{{ url('/') }}/public/images/{{ $news->images }}" alt="">
				</div>
				<a href="{{route('bai-viet',['slug'=>$news->slug])}}">
					<div class="title-news">
						<div class="like">
							<i class="fa fa-heart" aria-hidden="true"></i>
							99 likes
						</div>
						<div class="caption">
							{{ $news -> title }}
						</div>
					</div>
				</a>
			</div>
		</div>
		@endforeach()
	</div>
</div>
@stop()