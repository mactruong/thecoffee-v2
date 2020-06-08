@extends('layouts.backend')
@section('title','/ BÁN HÀNG')
@section('box-title','Chọn khách hàng')

@section('box-body')

	<a href="{{route('backend.user-create')}}"><button type="" class="btn-add" style="margin-bottom: 30px"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới khách hàng</button></a>

	<form>
		<div class="d-flex">
			<input  class="form-control input-search input-width" id="inputSearchCustomer" onkeyup="searchCustomer()" placeholder="Nhập tên hoặc số điện thoại khách hàng" name="value">
		</div>

	</form>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th class="text-center">Mã</th>
				<th>Tên khách hàng</th>
				<th>Địa chỉ</th>
				<th>Số điện thoại</th>
				<th class="text-center">Chọn khách hàng</th>
			</tr>
		</thead>

		<tbody id="list-customer">

			@foreach($users as $s)
			
			<tr>
				<td align="center">
					{{ $s->id }}
				</td>
				<td>
					{{ $s->full_name }}
				</td>
				<td>
					{{ $s->address }}
				</td>
				<td>
					{{ $s->phone }}
				</td>
				<td align="center">
					<a href="{{ route('backend.order-add-product',['s_id'=> $s->id]) }}" class="btn btn-success" style="border: 0; font-size: 12px;">Chọn</a>
				</td>
			</tr>
			
			@endforeach

		</tbody>
	</table>

@stop()
