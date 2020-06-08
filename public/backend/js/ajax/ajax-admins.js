//admin
loadDataAdmin();
function loadDataAdmin(){
	$("#tbody-admin").empty();
	$.ajax({
		url:'/thecoffee/api/admin',
		method: "GET",
		dataType: "json",
		data:"",
		success:function(data){
			let table ="";
			let role_name="";
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
				table += item['name'];
				table += '</td>';
			   		        
				table += '<td align="center">';
				table += '<a href="/thecoffee/backend/admin-edit/'+item['id']+'" class="label label-success" style="margin-right: 10px">Sửa</a>';
					table += '<a class="label label-danger btn-del" onclick="btnDelAdmin('+item['id']+')">';
					table += 'Xóa';
					table += '</a>';
				table += '</td>';
				table += '</tr>';
			})
			$("#tbody-admin").append(table);
		}
	});
	}

	$("#btn-admin-create-res").click(function(){
		var name = $("input[name='username']").val();
		var cafe = $("input[name='full_name']").val();
		var address = $("input[name='email']").val();
		var token = $("input[name='_token']").val();

		$.ajax({
			url:'/thecoffee/api/create-admin',
			method: "POST",
			data: {username:username,full_name:full_name,email:email,_token:token},
			dataType: "json",
			success:function(res){
				if (res==1) {
					alert("Thêm mới thành công");
					location.href = "http://localhost:8080/thecoffee/backend/backend.admin";
				}else{
					$(".error").html("Thêm mới thất bại");
				}
			},
			fail:function(res){
			}
		});
	});


function btnEditAdmin(id){
	var name = $("input[name='username']").val();
	var cafe = $("input[name='full_name']").val();
	var address = $("input[name='email']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
		url:'/thecoffee/api/update-admin/'+id,
		method: "PUT",
		dataType: "json",
		data:{username:username,full_name:full_name,email:email,_token:token},
		success:function(res){
			if (res == 1) {
				alert("Sửa thành công");
				location.href = "http://localhost:8080/thecoffee/backend/backend.admin";
			}else{
				alert("Sửa thất bại");
			}
		}
	});
}

function btnDelAdmin(id) {
	$.ajax({
		url:'/thecoffee/api/delete-admin/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công");
			loadDataAdmin();
		}
	});
}