<!--Project Main Page-->
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
</style>

@include('inc.success')

@section('dashboard')

 @foreach($pros as $pro)
        <li>
            <a href="{{ route('projects.edit', [$pro]) }}">
             {{ $pro->proj_name }} 
            </a>
                     
        </li>
@endforeach                      
@endsection

@section('navbar')
    @include('inc.navbar')
@endsection

@section('content')

@include('inc.title')
<br>

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

@if ($pros->isEmpty())
    <h3>If you don't have a team:</h3>
    <p>Assign yourself to a team in <b>Team</b></p>

    <h3>If your team does not have project:</h3>
    <p>Create a project here and then assign it to your team in <b>Team</b></p>
    
@else

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

@endif

  </table>
  <br><br><br>

  <button type="submit"><a href="{{route('projects.create')}}">Add Project</a></button>

@endsection
