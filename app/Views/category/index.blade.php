@extends('layouts.backend')
@section('title','/ DANH MỤC')
@section('box-title','Danh sách danh mục')
@section('box-body')

	<table class="table table-hover">
		<thead>
			<tr>
				<th class="text-center">Mã danh mục</th>
				<th>Tên danh mục</th>
				<th class="text-center">Tác vụ</th>
			</tr>
		</thead>
		
		<!-- <tbody id="tbody-category"> -->

		<tbody id="tbody-category">
         @foreach($categories as $category)

			<tr>
				<td align="center" width="150">{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
				
				<td align="center">
					<a href="{{ route('backend.category-edit',[$category->slug]) }}" class="label label-success" title="Sửa">Sửa</a>
					<a href="{{ route('backend.category-delete',[$category->slug])}}" class="label label-danger" onclick="return confirm('Bạn muốn xóa danh mục này')" title="Xóa">Xóa</a>
				</td>
			</tr>
			@endforeach()
		<tbody>

		</tbody>
	</table>

	<!-- <script src="{{ url('/') }}/public/backend/js/ajax/ajax-category.js"></script> -->

@stop