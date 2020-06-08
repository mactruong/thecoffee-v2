@extends('layouts.backend')
@section('title','/ BÀI VIẾT')
@section('box-title','Danh sách bài viết')
@section('box-body')

    <div class="m-b-10">
     	Tìm kiếm bài viết:
    </div>
	<input type="text" id="inputSearchNew" class="input-search" onkeyup="searchNews()" placeholder="Nhập tên bài viết" title="Tìm kiếm bài viết">

	<table class="table table-hover">
		<thead>
			<tr>
				<th class="text-center">Mã</th>
				<th>Title</th>
				<th class="width-review">Mở đầu</th>
				<th class="width-review" >Nội dung</th>			
				<th>Ảnh</th>	
				<th class="text-center">Tác vụ</th>
			</tr>
		</thead>

		<!-- <tbody id="tbody-news"> -->
        <tbody>

        	@foreach($news as $news)

			<tr>
				<td align="center">{{ $news->id }}</td>
				<td width="200">{{ $news->title }}</td>
				<td width="400">{{ $news->short_content }}</td>
				
				<td class ="content-new">{{ $news->full}}</td>

				<td  align="center" class ="column-image">
					<img src="{{ url('/')}}/public/images/{{ $news->images }}" class="width-image" >
				</td>

				<td align="center" width="120">
					<a href="{{ route('backend.news-edit',[$news->id]) }}" class="label label-success" title="Sửa">Sửa</a>
					<a href="{{ route('backend.news-delete',[$news->id])}}" class="label label-danger" onclick="return confirm('Bạn muốn xóa sản phẩm này')" title="Xóa">Xóa</a>
				</td>

			</tr>
			@endforeach()	


		</tbody>
	</table>

    <!-- <script src="{{ url('/') }}/public/backend/js/ajax/ajax-news.js"></script> -->
@stop
