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

@section('navbar')
    @include('inc.navbar')
@endsection

@section('content')
<h1>Add Task</h1>
<br>
<form action="{{route('tasks.store')}}" method="post" enctype="multipart/form-data">

    @csrf

    Sprint ID:
     <select name="sprint_id">
            @foreach($sprints as $sprint)
            <option value="{{ $sprint->sprint_id}}" {{ ((isset($sprint->sprint_id) && $sprint->sprint_id== $sprint->sprint_id)? "selected":"") }}>{{$sprint->sprint_id}}</option>
            @endforeach
            
      </select>
    <br><br><br>  
    
    User Story ID :
     <select name="u_id">
            @foreach($userstories as $userstory)
            <option value="{{ $userstory->u_id}}" {{ ((isset($userstory->u_id) && $userstory->u_id== $userstory->u_id)? "selected":"") }}>{{$userstory->u_id}}</option>
            @endforeach
            
      </select>
    <br><br><br>  
    Task ID :<input type="text" name="id" style="margin-left:2.5em" >
    <br><br><br>
    Title :<input type="text" name="title" style="margin-left:2.5em" >
    <br><br><br>
    Description :<input type="text" name="description" style="margin-left:2.6em" >
    <br><br><br>

    Status ID :
     <select name="status_id">
            @foreach($statuses as $status)
            <option value="{{ $status->id}}" {{ ((isset($status->id) && $status->id== $status->id)? "selected":"") }}>{{$status->id}}</option>
            @endforeach
            
      </select>
    <br><br><br>  

    Start Date :<input type="date" name="start_date" style="margin-left:2.6em" value="projects->start_date" >
    <br><br><br>
    Completion Date :<input type="date" name="end_date" style="margin-left:2.6em" value="projects->end_date" >
    <br><br><br>
    
        
        <button type="submit">Add Task</button>
        
    <br><br><br>



@endsection
