// quyen quan ly

loadDataRole();
function loadDataRole(){
	$("#tbody-role").empty();
	$.ajax({
		url:'/thecoffee/api/role',
		method: "GET",
		dataType: "json",
		data:"",
		success:function(data){
			var table ="";
			$.each(data,function(i,item) {
				table += '<tr>';
				table += '<td align="center">';
				table += item['id'];
				table += '</td>';
				table += '<td>';
				table += item['name'];
				table += '</td>';
				table += '<td align="center">';
				if (item['status'] == 1) {
					table += '<div class="label label-primary">';
					table += "Hoạt động";
					table += '</div>';
				} else {
					table += '<div class="label label-danger">';
					table += "Tắt";
					table += '</div>';
				}
				table += '<td align="center">';
				table += '<a href="/thecoffee/backend/role-edit/'+item['id']+'" class="label label-success" >Sửa</a>';
				// table += '<a class="label label-danger btn-del" style="margin-left: 10px" onclick="btnDelRole('+item['id']+')">';
				// table += 'Xóa';
				// table += '</a>';
				table += '</td>';
				table += '</tr>';
			})
			$("#tbody-role").append(table);
		}
	});
}
$("#btn-role-create-res").click(function(){
	var name = $("input[name='name']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
		url:'/thecoffee/api/create-role',
		method: "POST",
		data: {name:name,status:status,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm thành công");
				location.href = "http://localhost:8080/thecoffee/backend/role";
			}else{
				$(".error").html("Thêm thất bại");
			}
		},
		fail:function(res){
		}
	});
});


function btnEditRole(id){
	var name = $("input[name='name']").val();
	var token = $("input[name='_token']").val();
	$.ajax({
		url:'/thecoffee/api/update-role/'+id,
		method: "PUT",
		dataType: "json",
		data:{name:name,token:token},
		success:function(res){
			if (res == 1) {
				alert("Sửa thành công");
				location.href = "http://localhost:8080/thecoffee/backend/role";
			}else{
				alert("Sửa thất bại");
			}
		}
	});
}

function btnDelRole(id) {
	$.ajax({
		url:'/thecoffee/api/delete-role/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công!");
			loadDataRole();
		}
	});
}