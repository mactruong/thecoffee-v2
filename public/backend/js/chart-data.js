var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
	var n1 = document.getElementById('online-1').innerHTML;
	var n2 = document.getElementById('online-2').innerHTML;
	var n3 = document.getElementById('online-3').innerHTML;
	var n4 = document.getElementById('online-4').innerHTML;
	var n5 = document.getElementById('online-5').innerHTML;
	var n6 = document.getElementById('online-6').innerHTML;
	var n7 = document.getElementById('online-7').innerHTML;
	var n8 = document.getElementById('online-8').innerHTML;
	var n9 = document.getElementById('online-9').innerHTML;
	var n10 = document.getElementById('online-10').innerHTML;
	var n11 = document.getElementById('online-11').innerHTML;
	var n12 = document.getElementById('online-12').innerHTML;

	var x1 = document.getElementById('store-1').innerHTML;
	var x2 = document.getElementById('store-2').innerHTML;
	var x3 = document.getElementById('store-3').innerHTML;
	var x4 = document.getElementById('store-4').innerHTML;
	var x5 = document.getElementById('store-5').innerHTML;
	var x6 = document.getElementById('store-6').innerHTML;
	var x7 = document.getElementById('store-7').innerHTML;
	var x8 = document.getElementById('store-8').innerHTML;
	var x9 = document.getElementById('store-9').innerHTML;
	var x10 = document.getElementById('store-10').innerHTML;
	var x11 = document.getElementById('store-11').innerHTML;
	var x12 = document.getElementById('store-12').innerHTML;

	var lineChartData = {

			labels : ["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"],
			datasets : [
				{
					label: "Đơn Online",
					fillColor : "rgba(220,0,0,0.2)",
					strokeColor : "rgba(220,0,0,1)",
					pointColor : "rgba(220,0,0,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,0,0,1)",
					data : [n1,n2,n3,n4,n5,n6,n7,n8,n9,n10,n11,n12]
				},
				{
					label: "Đơn bán tại cửa hàng",
					fillColor : "rgba(48, 164, 255, 0.2)",
					strokeColor : "rgba(48, 164, 255, 1)",
					pointColor : "rgba(48, 164, 255, 1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(48, 164, 255, 1)",
					data : [x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12]
				}
			]

		}
		
	var barChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,0.8)",
					highlightFill: "rgba(220,220,220,0.75)",
					highlightStroke: "rgba(220,220,220,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				},
				{
					fillColor : "rgba(48, 164, 255, 0.2)",
					strokeColor : "rgba(48, 164, 255, 0.8)",
					highlightFill : "rgba(48, 164, 255, 0.75)",
					highlightStroke : "rgba(48, 164, 255, 1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}
			]
	
		}

	var pieData = [
				{
					value: 300,
					color:"#30a5ff",
					highlight: "#62b9fb",
					label: "Blue"
				},
				{
					value: 50,
					color: "#ffb53e",
					highlight: "#fac878",
					label: "Orange"
				},
				{
					value: 100,
					color: "#1ebfae",
					highlight: "#3cdfce",
					label: "Teal"
				},
				{
					value: 120,
					color: "#f9243f",
					highlight: "#f6495f",
					label: "Red"
				}

			];
			
	var doughnutData = [
					{
						value: 300,
						color:"#30a5ff",
						highlight: "#62b9fb",
						label: "Blue"
					},
					{
						value: 50,
						color: "#ffb53e",
						highlight: "#fac878",
						label: "Orange"
					},
					{
						value: 100,
						color: "#1ebfae",
						highlight: "#3cdfce",
						label: "Teal"
					},
					{
						value: 120,
						color: "#f9243f",
						highlight: "#f6495f",
						label: "Red"
					}
	
				];

window.onload = function(){
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true
	});
	var chart2 = document.getElementById("bar-chart").getContext("2d");
	window.myBar = new Chart(chart2).Bar(barChartData, {
		responsive : true
	});
	var chart3 = document.getElementById("doughnut-chart").getContext("2d");
	window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {responsive : true
	});
	var chart4 = document.getElementById("pie-chart").getContext("2d");
	window.myPie = new Chart(chart4).Pie(pieData, {responsive : true
	});
	
};