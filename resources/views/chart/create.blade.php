@extends('layouts.app2')

<style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }s
        
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

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        @if (isset($form))
            <h1 class="display-4 mb-4">{{ $form->getTitle() }}</h1>


            <?php
$actualArray = array(10,9,8,6,8,5,4,3,2, 1.2,0);

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



<div id="container-burndown" style="margin-left:130px; text-align:center; max-width: 1000px; height: 450px;"></div>

<script>
jQuery(document).ready(function() {
var doc = $(document);
$('#container-burndown').highcharts({
    title: {
      text: 'Burndown Chart',
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
        @else
            <h1 class="display-4">Welcome</h1>
        @endif
    </div>
@endsection

