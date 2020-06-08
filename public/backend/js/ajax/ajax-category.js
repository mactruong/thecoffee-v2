// danh mục

loadDataCat();

function loadDataCat(){
	$("#tbody-category").empty();
	$.ajax({
		url:'/thecoffee/api/category',
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
				table += item['name'];
				table += '</td>';

				table += '<td align="center">';
				table += '<a href="/thecoffee/backend/category-edit/'+item['slug']+'" class="label label-success">Sửa</a>';

				table += '<a class="label label-danger btn-del" style="margin-left: 10px" onclick="btnDelCat('+item['id']+')">';
				table += 'Xóa';
				table += '</a>';
				table += '</td>';
				table += '</tr>';
			})
			$("#tbody-category").append(table);
		}
	});
}

$("#btn-category-create-res").click(function(){
	var name = $("input[name='name']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
		url:'/thecoffee/api/create-category',
		method: "POST",
		data: {name:name,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm thành công");
				location.href = "http://localhost:8080/thecoffee/backend/category";
			}else{
				$(".error").html("Thêm thất bại");
			}
		},
		fail:function(res){
		}
	});
});


function btnEditCat(slug){
	var name = $("input[name='name']").val();
	var slug = $("input[name='slug']").val();
	var token = $("input[name='_token']").val();
	$.ajax({
		url:'/thecoffee/api/update-category/'+slug,
		method: "PUT",
		dataType: "json",
		data:{name:name, slug:slug, token:token},
		success:function(res){
			if (res == 1) {
				alert("Sửa thành công");
				location.href = "http://localhost:8080/thecoffee/backend/category";
			}else{
				alert("Sửa thất bại");
			}
		}
	});
}

function btnDelCat(id) {
	$.ajax({
		url:'/thecoffee/api/delete-category/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công!");
			loadDataCat();
		}
	});
}