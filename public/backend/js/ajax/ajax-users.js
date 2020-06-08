loadDataUser();

function loadDataUser(){
	$("#tbody-user").empty();
$.ajax({
	url:'/thecoffee/api/user',
	method: "GET",
	dataType: "json",
	data:"",
	success:function(data){
		var table ="";
		$.each(data,function(i,item){
			table += '<tr>';
			table += '<td align="center">';
			table += item['id'];
			table += '</td>';
			table += '<td>';
			table += item['username'];
			table += '</td>';
			table += '<td>';
			table += item['full_name'];
			table += '</td>';
			table += '<td>';
			table += item['email'];
			table += '</td>';
			table += '<td>';
			table += item['address'];
			table += '</td>';
			table += '<td>';
			table += item['phone'];
			table += '</td>';
			table += '<td align="center">';
			
			// table += '<a href="/thecoffee/backend/user-edit/'+item['id']+'" class="label label-success" style="margin-right: 10px">Sửa</a>';
				table += '<a class="label label-danger btn-del" onclick="btnDelUser('+item['id']+')">';
				table += 'Xóa';
				table += '<a>';
			table += '</td>';
			table += '</tr>';
		})
		$("#tbody-user").append(table);
	}
});
}

$("#btn-user-create-res").click(function(){
	var username = $("input[name='username']").val();
	var password = $("input[name='password']").val();
	var full_name = $("input[name='full_name']").val();
	var email = $("input[name='email']").val();
	var address = $("input[name='address']").val();
	var phone = $("input[name='phone']").val();
	var password_rp = $("input[name='password_rp']").val();
	var groups = $("select[name='groups']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
		url:'/thecoffee/api/create-user',
		method: "POST",
		data: {username:username,password:password,full_name:full_name,email:email,address:address,phone:phone,password_rp:password_rp,groups:groups,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm mới thành công");
				location.href = "http://localhost:8080/thecoffee/backend/user";
			}else{
				$(".error").html("them that bai");
			}
		},
		fail:function(res){
		}
	});

});



function btnDelUser(id) {
	$.ajax({
		url:'/thecoffee/api/delete-user/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công!");
			loadDataUser();
		}
	});
}