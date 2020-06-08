@extends('layouts.backend')
@section('title','/ BANNER')
@section('box-title','Banner trang chủ')
@section('box-body')
	
	
        <a href="{{ route('backend.banner-edit',[$banner->id]) }}" 
        	class="btn btn-add" title="Sửa">
        	<i class="fa fa-pencil" aria-hidden="true"></i> Chỉnh sửa
        </a>

			<div class="m-b-25">
				<div class="title-banner">
					Tiêu đề:
				</div>
				<p>
					{{$banner->title}}
				</p>
				
			</div>

			<div class="m-b-25 max-width-500" >

				<div class="title-banner">
					Nội dung:
				</div>
				<p>
					{{$banner->descriptions}}
				</p>
				
			</div>
    	
    		<div class="row">

	    		<div class="col-md-6">
	    			<div class="m-b-25">
	    				<div class="title-banner">
    						Ảnh 1:
    					</div>
                   		<img src="{{ url('/')}}/public/images/{{ $banner->image1 }}" width="350" >
	    			</div>
                    
                    <div class="m-b-25">
	                    <div class="title-banner">
	    					Ảnh 2:
	    				</div>
	                    <img src="{{ url('/')}}/public/images/{{ $banner->image2 }}" width="350" >
                    </div>

                     
	    		</div>

	    		<div class="col-md-6">
	    			<div class="m-b-25">
		    			<div class="title-banner">
	    					Ảnh 3:
	    				</div>
	                    <img src="{{ url('/')}}/public/images/{{ $banner->image3 }}" width="350" >
	    			</div>
	    			
	    			<div class="m-b-25">
		    			<div class="title-banner">
	    					Ảnh 4:
	    				</div>
	                    <img src="{{ url('/')}}/public/images/{{ $banner->image4 }}" width="350">
	    			</div>
	    		</div>
    		
    		</div>
@stop