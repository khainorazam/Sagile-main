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

        .button {
         background-color: #4CAF50; /* Green */
         border: none;
         color: white;
         padding: 15px 32px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 16px;
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
        
@endsection

@section('content')
<br><br>
    <a href="{{route('profeature.index')}}" class="button">Project List</a>
<br><br><br>

@csrf
<table  id="sprint">
  <tr>
      <th>ID</th>
      <th>Sprint Name</th>
      <th>Description</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Task Assign To</th>
      <th>Edit</th>
      <th>View</th>
      <th>Burndown Chart</th>
  </tr>
  
  @foreach($sprints as $sprint)
    <tr>
      <th>
        {{$sprint->sprint_id}}
      </th>

      <th>
        {{$sprint->sprint_name}}
      </th>

      <th>
        {{$sprint->sprint_desc}}        
      </th>

      <th>
        {{$sprint->start_sprint}}
      </th>

      <th>
        {{$sprint->end_sprint}}
      </th>

      <th>
        {{$sprint->users_name}}
      </th>

      <th>
        <a href="{{route('sprints.edit', [$sprint->sprint_id])}}">Edit</a>
      </th>

      <th>
          <a href="{{action('ProductFeatureController@index3', $sprint['sprint_id'])}}">View</a>
      </th>

      <th>
        <a href="{{action('ChartController@index', $sprint['sprint_id'])}}">Show</a>
      </th>
    </tr>
  
 
  @endforeach
  </table>
  
  <br><br><br>
  
  <button type="submit"><a href="{{route('sprints.create')}}">Create Sprint</a></button>
 
@endsection