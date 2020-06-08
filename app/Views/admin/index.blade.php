@extends('layouts.backend')
@section('title','/ TÀI KHOẢN QUẢN TRỊ')
@section('box-title','Danh sách tài khoản quản trị')
@section('box-body')

<div>
   
	<table class="table table-hover">
		<thead>
			<tr>
				<th class="text-center">Mã</th>
				<th>Tài khoản</th>
				<th>Họ tên</th>
				<th>Email</th>
				<th>Quyền</th>
				<th class="text-center">Tác vụ</th>
			</tr>
		</thead>

		<tbody id="tbody-admin">
		</tbody>
	</table>

</div>

<script src="{{ url('/') }}/public/backend/js/ajax/ajax-admins.js"></script>

@stop