@extends('layouts.backend')
@section('title','/ QUYỀN QUẢN LÝ')
@section('box-title','Danh sách quyền quản lý')
@section('box-body')
	
	<a href="{{route('backend.role-create')}}"><button type="" class="btn-add"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button></a>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th class="text-center">Mã</th>
				<th>Tên quyền</th>
				<th class="text-center">Trạng thái</th>
				<th class="text-center">Tác vụ</th>
			</tr>
		</thead>

		<tbody id="tbody-role">
			<!-- @foreach($role as $ro)
			<tr>
				<td align="center">{{ $ro->id }}</td>
				<td>{{ $ro->name }}</td>

				@if($ro->status == 1 )

				<td>
					<a class="label label-primary">Hoạt dộng</a>
				</td> 
				
				@else()

				<td>
					<a class="label label-warning">Tắt</a>
				</td> 
				
				@endif()
				<td align="center">
					<a href="{{ route('backend.role-edit',[$ro->id]) }}" class="label label-success" title="Sửa">Sửa</a>
					<a href="{{ route('backend.role-delete',[$ro->id])}}" class="label label-danger" onclick="return confirm('Bạn muốn xóa danh mục này')" title="Xóa">Xóa</a>
				</td>
			</tr>
			@endforeach() -->
		</tbody>
	</table>

	<script src="{{ url('/') }}/public/backend/js/ajax/ajax-role.js"></script>
@stop