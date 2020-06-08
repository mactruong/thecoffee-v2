@extends('layouts.index')
@section('main')

<div class="container"> 
	<div class="profile">		
		<h4> THE COFFEE / TRANG CÁ NHÂN </h4>
		<div class="row"> 

			<div class="col-lg-4 col-sm-12">
				<div class="avatar">
					<img src="{{ url('/') }}/public/images/default-avatar-png-18.png" alt="">
				</div>
				
				<div class="link-profile">
					<a href="{{route('history-order')}}">Đơn hàng đã đặt</a>
				</div>

				<div class="link-profile">
					<a href="{{route('edit-profile',['id'=>Auth::user()->id ])}}">Chỉnh sửa thông tin cá nhân</a>
				</div>

				<div class="link-profile">
					<a href="{{route('change-password',['id'=>Auth::user()->id ])}}">Đổi mật khẩu?</a>
				</div>
			</div>

			<div class="col-lg-8 col-sm-12 info">
				<div class="user-name">
					{{ Auth::user()->username }}
				</div>

				<div class="full-name">
					{{ Auth::user()->full_name }}
				</div>

				<div style="width: 70%;  padding-left: 40px">
					<hr>
				</div>

				<div class="content-right">
					
					<div class="info-detail">
						Email: <span>{{ Auth::user()->email }} </span>
					</div>

					<div class="info-detail">
						Số điện thoại: <span>{{ Auth::user()->phone }} </span>
					</div>

					<div class="info-detail">
						Địa chỉ: <span>{{ Auth::user()->address }} </span>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@stop()