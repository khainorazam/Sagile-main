@extends('layouts.app2')

<style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        
        h1 {
          text-align:center;
        }
</style>

@section('dashboard')

@foreach($projects as $project)
        <li>
            <a href="{{ route('projects.edit', [$project]) }}">
             {{ $project->proj_name }} 
            </a>
                     
        </li>
@endforeach
        
@if($projects->isEmpty())
     No project.
@endif
@endsection

@section('content')

<h1>Sprint {{ $sprint_id}} User Story (Task) Info<h1>
@csrf

<table id=userstories>
  <tr>
    <th>ID</th>
    <th>User Stories</th>
    <th>Day</th>
  </tr>

<?php
$x=0;
$actualArray = array();
?>

  @if(count($userstories) )
  @foreach($userstories as $userstory)

  <tr>
    <th>
      {{ $userstory->u_id }}
    </th>
        
    <th>
      {{$userstory->user_story}}
    </th>

    <th>
      {{ $userstory->due_day }}  
    </th>
  </tr>

  @endforeach
  @endif
  </table>

  <br><br>

  <table id=userstories>
  <tr>
    <th>Date/Day</th>
    <th>Ideal Tasks Done</th>
    <th>Actual Tasks Done</th>
  </tr>

  </table>


<?php
  if(count($userstories))
  {
    foreach ($userstories as $userstory)
    {
     $actualArray[$x]= (int)$userstory->due_day;
     $x++;
    }
  }

//$actualArray = array(10,9,8,6,8,5,4,3,2, 1.2,0);

$idealArray = range(0, 4, 1);
$idealXArray = array();
foreach ($idealArray as $value){
    $value = trim($value);
    $idealXArray[] = 'Day '.$value;
}
?>  

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<title> Burndown charts</title>

<div><h3>Burndown Chart</h3></div>

<div id="container-burndown" style="margin-left:130px; text-align:center; max-width: 1000px; height: 450px;"></div>

<script>
jQuery(document).ready(function() {
var doc = $(document);
$('#container-burndown').highcharts({
    title: {
      text: 'Burndown Chart of Sprint {{ $sprint_id }}',
      x: -10 //center
    },
	scrollbar: {
                barBackgroundColor: 'gray',
                barBorderRadius: 7,
                barBorderWidth: 0,
                buttonBackgroundColor: 'gray',
                buttonBorderWidth: 0,
                buttonBorderRadius: 7,
                trackBackgroundColor: 'none',
                trackBorderWidth: 1,
                trackBorderRadius: 8,
                trackBorderColor: '#CCC'
            },
    colors: ['blue', 'red'],
    plotOptions: {
      line: {
        lineWidth: 3
      },
      tooltip: {
        hideDelay: 200
      }
    },
  
    xAxis: {
      categories: <?php echo json_encode($idealXArray);?>
    },
    yAxis: {
      title: {
        text: 'Remaining Work (Tasks Left)'
		
      },
			 type: 'linear',
			 max:10,
			 min:0,
			 tickInterval :1
	 
    },
	
    tooltip: {
      valueSuffix: ' task(s)',
      crosshairs: true,
      shared: true
    },
    legend: {
     layout: 'horizontal',
      align: 'center',
      verticalAlign: 'bottom',
      borderWidth: 0
    },
    series: [{
      name: 'Ideal Burn',
      color: 'rgba(255,0,0,0.25)',
      lineWidth: 2,
	  
      data: <?php echo json_encode(array_reverse($idealArray));?>
    }, {
      name: 'Actual Burn',
      color: 'rgba(0,120,200,0.75)',
      marker: {
        radius: 6
      },
      data: <?php echo json_encode($actualArray);?>
    }]
  });
    });
</script>
</html>

<!--
<html>
<head>
<br>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Planning');
      data.addColumn('number', 'Actual');

      data.addRows([
        [1,  82, 82],
        [2,  80, 80],
        [3,  78, 77],
        [4,  76, 75],
        [5,  74, 73],
        [6,  72, 71],
        [7,  70, 69],
        [8,  68, 67],
        [9,  66, 65],
        [10, 64, 63],
        [11, 62, 61],
        [12, 60, 59],
        [13, 58, 57],
        [14, 56, 55],
        [15, 54, 53],
        [16, 52, 51],
        [17, 50, 49],
        [18, 48, 47],
        [19, 46, 45],
        [20, 44, 43],
        [21, 42, 41],
        [22, 40, 39],
        [23, 38, 37],
        [24, 36, 35],
        [25, 34, 33],
        [26, 32, 31],
        [27, 30, 29],
        [28, 28, 27],
        [29, 26, 25],
        [30, 24, 23],
        [31, 22, 21]
      ]);

      var options = {
        chart: {
          title: 'Burn Down Chart',
          subtitle: ''
        },
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'bottom'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_bottom_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
</head>
<body>
  <div id="line_bottom_x"></div>
</body>
</html>




--->
@endsection
