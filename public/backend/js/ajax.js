

function fetchDataOrder(){
	
 $.ajax({
  url: '/thecoffee/api/order',
  type: 'get',
  data:"",
  success: function(data) {
	let filteredOrder = data.filter(function(data) {
	  return data.status == 'pending';
	});
    
    let numberOrder = filteredOrder.length;
    document.getElementById("number-notification").innerHTML = numberOrder;

  },
  complete:function(data) {
   setTimeout(fetchDataOrder,2000);
  }
 });
}

 setTimeout(fetchDataOrder,2000);


$("#saveAsExcel").click(function() {

  let workbook = XLSX.utils.book_new();

  let worksheet_data  = document.getElementById("list-order-day");
 
  let worksheet = XLSX.utils.table_to_sheet(worksheet_data);

  workbook.SheetNames.push("BaoCao");
  workbook.Sheets["BaoCao"] = worksheet;

   exportExcelFile(workbook);
      
     
});

function exportExcelFile(workbook) {
    return XLSX.writeFile(workbook, "BaoCaoHangNgay.xlsx");
}