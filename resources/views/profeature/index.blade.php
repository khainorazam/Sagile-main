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
@if ($role_name == 'Admin')
    @include('inc.navbar')

@elseif ($role_name == 'Project Manager')
    @include('inc.navprojectmanager')

@elseif ($role_name == 'Product Owner')
    @include('inc.navproductowner')

@elseif ($role_name == 'Scrum Master')
    @include('inc.navscrummaster')

@elseif ($role_name == 'Developer')
    @include('inc.navdeveloper')
@endif
@endsection

@section('content')
<br><br><br>


<table>

<tr>
    <th>Title</th>
    <th>Description</th>
    <th>Start Date</th>
    <th>End Date</th>

    <!--Project Features only given to Project Manager and Admin-->
    @if ($role_name == 'Admin' || $role_name == 'Project Manager')
    <th>Edit</th>
    @endif

    <!--View Sprint only given to Product Owner and Admin-->
    @if ($role_name == 'Admin' || $role_name == 'Product Owner')
        <th>View</th>
    @endif

    @if ($role_name == 'Admin' || $role_name == 'Project Manager')
    <th>Delete</th>
    @endif

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
        
          <!--Project Features only given to Project Manager and Admin-->
          @if ($role_name == 'Admin' || $role_name == 'Project Manager')
          <th>
              <button type="submit"><a href="{{route('projects.edit', $pro)}}">Edit</a></button>
          </th>
          @endif

          <!--View Sprint only given to Product Owner and Admin-->
          @if ($role_name == 'Admin' || $role_name == 'Product Owner')
            <th>
                <button type="submit"><a href="{{action('ProductFeatureController@index2', $pro['proj_name'])}}">View</button>
            </th>
          @endif
          
          @if ($role_name == 'Admin' || $role_name == 'Project Manager')
          <th>
              <button type="submit"><a href="{{route('projects.destroy', $pro)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?');">Delete</button>
          </th>
          @endif
          
      </tr>

@endforeach

  </table>
  <br><br><br>

  @if ($role_name == 'Admin' || $role_name == 'Project Manager')
  <button type="submit"><a href="{{route('projects.create')}}">Add Project</a></button>
  @endif

@endsection

<!--<script>$(document).ready(function(){}-->