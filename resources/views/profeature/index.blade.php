@extends('layouts.app2')


<!--
$connect = mysqli_connect("localhost", "root", "", "psmtrial");

function fill_project($connect)
{
  $output = '';
  $sql = "SELECT * FROM projects";
  $result = mysqli_query($connect, $sql);

  while($row = mysqli_fetch_array($result))
  {
    $output .='<option value="'$row["id"].'">'.$row["proj_name"].'</option>';
  }
  return $output;
}

function fill_sprint($connect)
{
  $output = '';
  $sql = "SELECT * FROM sprint";
  $result = mysqli_query($connect, $sql);

  while($row = mysqli_fetch_array($result))
  {
    
    $output .= '<div class="col-md-3">'
    $output .= '<div style="boarder:1px solid #ccc; padding:20px; margin-bottom:20px;">' .$row["sprint_name"].'';
    $output .='</div>';
    $output .='</div>';
  }
  return $output;

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
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
</style>

@section('dashboard')

 @foreach($pros as $pro)
        <li>
            <a href="{{ route('projects.edit', [$pro]) }}">
             {{ $pro->proj_name }} 
            </a>
                     
        </li>
@endforeach 

{{-- @foreach($projects as $project)
        <li>
            <a href="{{ route('projects.edit', [$project]) }}">
             {{ $project->proj_name }} 
            </a>
                     
        </li>
@endforeach --}}
                     
@endsection


@section('content')
<br><br><br>


<table>

<tr>
    <th>Title</th>
    <th>Description</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Edit</th>
    <th>View</th>
    <th>Delete</th>

</tr>

@foreach($pros as $pro)

      <tr> 
          <th>
                  {{ $pro->proj_name }}
          </th>

          <th>
                  {{ $pro->proj_desc }}
          </th>

          <th>
                  {{ $pro->start_date }}
          </th>

          <th>
                  {{ $pro->end_date }}
          </th>

          <th>
              <button type="submit"><a href="{{route('projects.edit', $pro)}}">Edit</a></button>
          </th>

          <th>
              <button type="submit"><a href="{{action('ProductFeatureController@index2', $pro['proj_name'])}}">View</button>
          </th>

          <th>
              <button type="submit"><a href="{{route('projects.destroy', $pro)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?');">Delete</button>
          </th>
          
      </tr>

@endforeach

  </table>
  <br><br><br>

  <button type="submit"><a href="{{route('projects.create')}}">Add Project</a></button>

@endsection

<!--<script>$(document).ready(function(){}-->