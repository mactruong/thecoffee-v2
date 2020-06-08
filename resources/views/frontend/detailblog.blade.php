@extends('layouts.index')

@section('main')

	<div class="container detail-blog mr-top">
		<h4> THE COFFEE / BÀI VIẾT </h4>
		<div class="row">

			<div class="col-lg-8">
				
				<div class="title">
					<h2>{{ $news->title }}</h2>
					<div class="fa-like-share">
						<!--Like and share-->
						<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=192&layout=button_count&action=like&size=large&show_faces=true&share=true&height=46&appId" width="192" height="30" scrolling="no" frameborder="0" allow="encrypted-media"></iframe>                
					</div>
				</div>

				<div class="image">
					<img src="{{ url('/') }}/public/images/{{ $news->images }}" alt="">
				</div>

				<div class="content">
					<p>{{ $news->full }}</p>
				</div>

				<!--FB Comments-->
				<div class="fb-comments" data-href="https://www.google.com.vn" data-width="100%" data-numposts="5"></div>
			</div>

			<div class="col-lg-4 ">
				<h2> Bài viết mới nhất</h2>
				<div class="row">

					@foreach( $bloglike as $bloglike )

					<div class="col-lg-12 col-sm-6 col-xs-12">
						<div class="blog-like">
							<a href="{{route('bai-viet',['slug'=>$bloglike->slug])}}" title="{{ $bloglike->title }}" >
								<img src="{{ url('/') }}/public/images/{{ $bloglike->images }}" alt="">
							</a>

							<h3> 
								<a href="{{route('bai-viet',['slug'=>$bloglike->slug])}}">{{ $bloglike->title }}</a>
							</h3>
						</div>
					</div>

					@endforeach()

				</div>
			</div>
		</div>
	</div>

@stop()