@extends('layouts.backend')
@section('title','/ THÔNG TIN CỬA HÀNG')
@section('box-title','Thông tin cửa hàng')
@section('box-body')
	

	<a href="{{ route('backend.about-us-edit',[$aboutUs->id]) }}" 
		class="btn btn-add" title="Sửa">
			<i class="fa fa-pencil" aria-hidden="true"></i> Chỉnh sửa
	</a>

	<div class="p-10">
		
		<div class="m-b-25">
			<div class="title-banner">
				Địa chỉ:
			</div>
			<p>
				{{$aboutUs->address}}
			</p>
			
		</div>

		<div class="m-b-25 max-width-500" >

			<div class="title-banner">
				Số điện thoại:
			</div>
			<p>
				{{$aboutUs->phone}}
			</p>
			
		</div>

		<div class="row">

			<div class="col-md-6">
				<div class="m-b-25">
					<div class="title-banner">
						Email:
					</div>
					<p>
						{{$aboutUs->email}}
					</p>
				</div>
	            
	            <div class="m-b-25">
	                <div class="title-banner">
						Thời gian mở cửa:
					</div>
					<p>
						{{$aboutUs->time_work}}
					</p>
	            </div>

	            <div class="m-b-25">
	    			<div class="title-banner">
						Link Google Map:
					</div>
					<p>
						<a href="{{$aboutUs->link_map}}">{{$aboutUs->link_map}} </a>
					</p>
				</div>
	             
			</div>

			<div class="col-md-6">
				<div class="m-b-25">
	    			<div class="title-banner">
						Link Facebook:
					</div>
					<p>
						<a href="{{$aboutUs->link_fb}}">{{$aboutUs->link_fb}} </a>
					</p>
				</div>

				<div class="m-b-25">
	    			<div class="title-banner">
						Link Instagram:
					</div>
					<p>
						<a href="{{$aboutUs->link_instagram}}">{{$aboutUs->link_instagram}} </a>
					</p>

				</div>

				<div class="m-b-25">
	    			<div class="title-banner">
						Link Youtube:
					</div>
					<p>
						<a href="{{$aboutUs->link_youtube}}">{{$aboutUs->link_youtube}} </a>
					</p>

				</div>
	           
			</div>
		
		</div>
	</div>
    


@stop