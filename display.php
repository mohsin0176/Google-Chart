<!DOCTYPE html>
<html>
<head>
	<title>Google Chart</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
        $.ajax({
        	url:"data.php",
        	dataType:"JSON",
        	success:function(result)
        	{
        		google.charts.load('current',{
        			'packages':['corechart']
        		});
        		google.charts.setOnLoadCallback(function(){
        			drawChart(result);
        		});
        	}
            	});

        function drawChart(result)
        {
        	var data=new google.visualization.DataTable();
        	data.addColumn('string','name');
        	data.addColumn('number','Quantity');
        	var dataArray=[];
        	$.each(result,function(i,obj){
        		dataArray.push([obj.name,parseInt(obj.quantity)]);
        	});
        	data.addRows(dataArray);
        	var piechart=new google.visualization.pieChart
            (document.getElementById('piechart_div'));
            pieChart.draw(data,piechart_options);

            var barchart_options={
            	title:'Barchart:How Much Product Sold By Last Night',
            	width:400,
            	height:300,
            	legend:'none'
            };
            var barchart=new google.visualization.BarChart(document.getElementById('barchart_div'));
            barchart.draw(data,barchart_options);

                    }

                });
    </script>
</head>
<body>

<table class="columns">
	<tr>
		<td><div id="piechart_div" style="border:1px solid #ccc"></div></td>
	</tr>
		<tr>
		<td><div id="piechart_div" style="border:1px solid #ccc"></div></td>
	</tr>
</table>

</body>
</html>