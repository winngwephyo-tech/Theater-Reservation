@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/report/style.css') }}">
@endsection

@section('script')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection

@section('content')

<div class="wrapper mt-20">
    <div class="clearfix">
        <div class="left">
            <h2>Statistics</h2>
        </div>
        <div class="right">
            <a class="button" href="{{ url('/') }}"> Back</a>
        </div>
    </div>
        <div id="chart_div"></div>
        <div id="chart_div1"></div>
</div>
    
    <script type="text/javascript">
    var my_2d = <?php echo json_encode($data); ?>;
    console.log(my_2d);

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'title');
        data.addColumn('number', 'income');
        for(i = 0; i < my_2d.length; i++)
            {
                data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
            }
       var options1 = {
          hAxis: {title: 'Income',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          height: 350,
          backgroundColor: '#f9f9f9',
          colors:['#732dd9','#421980']
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options1);


       }
       
      google.charts.setOnLoadCallback(drawChart1);
      function drawChart1() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'title');
        data.addColumn('number', 'rating');
        for(i = 0; i < my_2d.length; i++)
            {
                data.addRow([my_2d[i][0], parseFloat(my_2d[i][2])]);
            }
        var options1 = {
        hAxis: {title: 'Rating',  titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0},
        height: 350,
        backgroundColor: '#f9f9f9',
        colors:['#421980','#732dd9']
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
            chart.draw(data, options1);


        }

</script>

@endsection