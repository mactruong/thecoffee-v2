
loadDataPro();
function loadDataPro(){
	$("#tbody-products").empty();

$.ajax({
	url:'/thecoffee/api/products',
	method: "GET",
	dataType: "json",
	data:"",
	success:function(data){
		var table ="";
		$.each(data,function(i,item){
			table += '<tr>';

			table += '<td>';
			table += item['id'];
			table += '</td>';

			table += '<td>';
			table += item['name'];
			table += '</td>';

			table += '<td>';
			table += item['review'];
			table += '</td>';

			table += '<td>';
			table += item['price'];
			table += '</td>';
			
			table += '<td>';
			table += '<img src="../public/images/'+item['image']+'" class="width-image">';
			table += '</td>';
			
			table += '<td>';
			table += item['promo'];
			table += '</td>';

			table += '<td>';
			table += item['category_name'];
			table += '</td>';

			table += '<td>';
			table += '<a href="/thecoffee/backend/products-edit/'+item['id']+'" class="label label-success" style="margin-right: 10px" >Sửa</a>';
			table += '<a class="label label-danger btn-del" onclick="btnDelPro('+item['id']+')">';
			table += 'Xóa';
			table += '</a>';
			table += '</td>';
			table += '</tr>';
		})
		$("#tbody-products").append(table);
	}
});
}

$("#btn-products-create-res").click(function(){
	var name = $("input[name='name']").val();
	var images = $("input[name='images']").val();
	var review = $("input[name='review']").val();
	var price = $("input[name='price']").val();
	var cat_id = $("select[name='cat_id']").val();
	var slug = $("input[name='slug']").val();
	var promo = $("input[name='promo']").val();	
	var token = $("input[name='_token']").val();

	$.ajax({
	   url:'/thecoffee/api/create-products',
	   method: "POST",
	   dataType: "json",
	   data: {name:name,image:image,review:review,price:price,promo:promo,cat_id:cat_id,_token:token},
	   success:function(res){
	   		if (res==1) {
				alert("Thêm mới thành công");
				location.href = "http://localhost:8080/thecoffee/backend/products";
			}else{
				$(".error").html("them that bai");
			}
	   },
	   fail:function(res){
	   }
	});
});


function btnEditPro(id){
	var name = $("input[name='name']").val();
	var images = $("input[name='images']").val();
	var review = $("input[name='review']").val();
	var price = $("input[name='price']").val();
	var cat_id = $("select[name='cat_id']").val();
	var slug = $("input[name='slug']").val();
	var promo = $("input[name='promo']").val();	
	var token = $("input[name='_token']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
	   url:'/thecoffee/api/update-products/'+id,
	   method: "PUT",
	   dataType: "json",
	   data: {name:name,image:image,review:review,price:price,promo:promo,cat_id:cat_id,_token:token},
		success:function(res){
			if (res == 1) {
				alert("Sửa thành công");
				location.href = "http://localhost:8080/thecoffee/backend/products";
			}else{
				alert("Sửa thất bại");
			}
		}
	});
}

function btnDelPro(id) {
	$.ajax({
		url:'/thecoffee/api/delete-products/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công!");
			loadDataPro();
		}
	});
}