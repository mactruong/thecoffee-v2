@extends('layouts.backend')
@section('title','/ KHÁCH HÀNG')
@section('box-title','Danh sách tài khoản khách hàng')
@section('box-body')

	<div>

		<!-- <a href="{{route('backend.user-create')}}"><button type="" class="btn-add"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button></a>
		<h3>Danh sách khách hàng</h3> -->
		
		<table class="table table-hover">

			<thead>

				<tr>
					<th class="text-center">Mã</th>
					<th>Tài khoản</th>
					<th>Họ tên</th>
					<th>Email</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th class="text-center">Tác vụ</th>
				</tr>
			</thead>
			
			<tbody>
				
			<!-- <tbody id="tbody-user">	 -->

			@foreach($users as $user)

			<tr>
				<td align="center">{{ $user->id }}</td>
				<td>{{ $user->username }}</td>
				<td>{{ $user->full_name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->address}}</td>
				<td>{{ $user->phone }}</td>
				<td align="center">
					<!-- <a href="{{ route('backend.user-edit',[$user->id]) }}" class="label label-success" title="Sửa">Sửa</a> -->
					<a href="{{ route('backend.user-delete',[$user->id])}}" class="label label-danger" onclick="return confirm('Bạn muốn xóa tài khoản khách hàng này')" title="Xóa">Xóa</a>
				</td>
			</tr>
			@endforeach()	
			</tbody>
		</table>

		<div class="text-center">
			{{ $users->links() }}		
		</div>

	</div>
	
 	<!-- <script src="{{ url('/') }}/public/backend/js/ajax/ajax-users.js"></script> -->
@stop