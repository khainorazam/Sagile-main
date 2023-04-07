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
