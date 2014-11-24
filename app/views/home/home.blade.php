@extends('default.main')
@section('content')
<div class="current-stage">
        Home /
</div>
<div class="data-container">
    <div class="body">
        titleTextStyle
    </div>
    <div id="chart_div" style="width: 900px; height: 300px;"></div>
    <div id="piechart_3d" style="width: 400px; height: 200px;"></div>
</div>
 @stop
 @section('script')
 <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Month', 'Sales', 'Purchases'],
        ['Jan',  1000,      100],
        ['Feb',  1170,      460],
        ['Mar',  660,       1120],
        ['Apr',  1030,      540],
        ['May',  1000,      400],
        ['Jun',  1170,      460],
        ['Jul',  660,       1120],
        ['Aug',  1030,      540],
        ['Sep',  1000,      400],
        ['Oct',  1170,      460],
        ['Nov',  660,       1120],
        ['Dec',  1030,      540]
      ]);

      var options = {
        title: 'Company Performance',
        hAxis: {title: 'Month', titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

      chart.draw(data, options);

    }
 </script>  
  <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Product', 'Quantity'],
        ['Mobile',     11],
        ['Laptop',      2],
        ['TV',  2],
        ['Smartphone', 2],
        ['LCD',    7]
      ]);

      var options = {
        title: 'Top Selling Products',
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(data, options);
    }
  </script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 @stop