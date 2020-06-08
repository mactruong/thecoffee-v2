
loadDataNews();
function loadDataNews(){
	$("#tbody-news").empty();
	$.ajax({
		url:'/thecoffee/api/news',
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
				table += item['title'];
				table += '</td>';
				table += '<td>';
				table += item['short_content'];
				table += '</td>';
				table += '<td>';
				table += '<div class = "content-new">';
				table += item['full'];
				table += '</div>';
				table += '</td>';
				table += '<td class ="column-image">';
				table += '<img src="../public/images/'+item['images']+'" class="width-100">';
				table += '</td>';
				table += '<td align="center">';
				// table += item['images'];
				// table += '</td>';
				// table += '<td>';
				table += '<a href="/thecoffee/backend/news-edit/'+item['id']+'" class="label label-success" style="margin-right:10px" >Sửa</a>';
				table += '<a class="label label-danger btn-del" onclick="btnDelNews('+item['id']+')">';
				table += 'Xóa';
				table += '</a>';
				table += '</td>';
				table += '</tr>';
			})
			$("#tbody-news").append(table);
		}
	});
}

$("#btn-news-create-res").click(function(){
	var name = $("input[name='name']").val();
	var status = $("select[name='status']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
		url:'/thecoffee/api/create-news',
		method: "POST",
		data: {title:title,short_content:short_content,full:full,images:images,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm thành công");
				location.href = "http://localhost:8080/thecoffee/backend/news";
			}else{
				$(".error").html("them that bai");
			}
		},
		fail:function(res){
		}
	});
});


function btnEditNews(id){
	var name = $("input[name='name']").val();
	var status = $("select[name='status']").val();
	var token = $("input[name='_token']").val();
	$.ajax({
		url:'/thecoffee/api/update-news/'+id,
		method: "PUT",
		dataType: "json",
		data: {title:title,short_content:short_content,full:full,images:images,_token:token},
		success:function(res){
			if (res == 1) {
				alert("Sửa thành công");
				location.href = "http://localhost:8080/thecoffee/backend/news";
			}else{
				alert("that bai");
			}
		}
	});
}
 
function btnDelNews(id) {
	$.ajax({
		url:'/thecoffee/api/delete-news/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công!");
			loadDataNews();
		}
	});
}