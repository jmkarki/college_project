@extends('default.main')
@section('content')
<div class="current-stage">
        Home /
</div>
<div class="data-container">
    <div class="body">
        tets
    </div>
    <div id="chart_div" style="width: 500px; height: 300px;"></div>
</div>
 @stop
 @section('script')
 <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Purchases'],
        ['2004',  1000,      400],
        ['2005',  1170,      460],
        ['2006',  660,       1120],
        ['2007',  1030,      540]
      ]);

      var options = {
        title: 'Company Performance',
        hAxis: {title: 'Year', titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

      chart.draw(data, options);

    }
 </script>
 @stop