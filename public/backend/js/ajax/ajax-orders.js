
loadDataOrder();
function loadDataOrder(){
	var table = "";
	$('.tbody-order').html('');

	$.ajax({
		url:'/thecoffee/api/order',
		method: "GET",
		dataType: "json",
		success:function(res){
			
			$.each(res,function(i,item){
				var cus_name="";
				var tab_name ="";
				var pro_name ="";
				// $.ajax({
				// 	url: '/thecoffee/api/user/'+item.id_cus,
				// 	method: "GET",
				// 	dataType: "json",
				// 	// async: false,
				// 	success:function(res){
				// 		cus_name = res.full_name;
				// 		console.log(cus_name);

				// 	},
				// 	fail: function(err){
				// 		console.log(err);
				// 	}
				// });


				// $.ajax({
				// 	url:'/thecoffee/api/products/'+item.pro_id,
				// 	method: "GET",
				// 	dataType: "json",
				// 	//async: false,
				// 	success:function(res){
				// 		pro_name = res.name;
				// 	}
				// });
				
				table += "<tr>";
				table += "<td>"+item.id+"</td>";
				table += "<td>"+cus_name+"</td>";
				table += "<td> "+pro_name+" </td>";
				table += "<td>"+item.sum+"</td>";
				table += "<td>"+item.created_at+"</td>";
				table += "<td><button type='button' onclick='btn()'>X</button></td>";
				table += "</tr>";
			})
			$('.tbody-order').html(table);
			//Lấy user
			
		}
	});
}