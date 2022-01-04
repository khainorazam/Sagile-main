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
        
@if($projects->isEmpty())
     No project.
@endif
@endsection


@section('content')
<br><br><br>
    <a href="{{route('sprints.index')}}" class="button">Sprint</a>

<br><br><br>
<form action="{{route('sprints.store')}}" method="post" enctype="multipart/form-data">

    @csrf
    
    Project Name :
     <select name="proj_name">
            @foreach($projects as $project)
            <option value="{{ $project->proj_name}}" {{ ((isset($project->proj_name) && $project->proj_name== $project->proj_name)? "selected":"") }}>{{$project->proj_name}}</option>
            @endforeach
            
      </select>
    <br><br><br>  
    Sprint Name :<input type="text" name="sprint_name" style="margin-left:2.5em" >
    <br><br><br>
    Description :<input type="text" name="sprint_desc" style="margin-left:2.6em" >
    <br><br><br>
    Assign To : 
     
    <select multiple class="form-control" name="users_name" id="username">
        @foreach($users as $user)
        <option value="{{ $user->username}}" {{ ((isset($user->username) && $user->name== $user->username)? "selected":"") }}>{{$user->username}}</option>
        @endforeach
    </select>
    
    <br><br><br>
    Start Date :<input type="date" name="start_sprint" style="margin-left:2.6em" value="projects->start_date" >
    <br><br><br>
    Completion Date :<input type="date" name="end_sprint" style="margin-left:2.6em" value="projects->end_date" >
    <br><br><br>
    
        
        <button type="submit">Add Sprint</button>
        
    <br><br><br>



@endsection

