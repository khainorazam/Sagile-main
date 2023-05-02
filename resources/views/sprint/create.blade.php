<!--Create Sprint Page-->

@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br><br>
<form action="{{route('sprints.store')}}" method="post" enctype="multipart/form-data">

    @csrf
    <!--Project Name Value -->
    <input type="hidden" name="proj_name" value="{{ $project->proj_name }}"> 

    Sprint Name :<input type="text" name="sprint_name" style="margin-left:2.5em" >
    <div class="error"><font color="red" size="2">{{ $errors->first('sprint_name') }}</p></font></div>
    <br><br>

    Description :<input type="text" name="sprint_desc" style="margin-left:2.6em" >
    <div class="error"><font color="red" size="2">{{ $errors->first('sprint_desc') }}</p></font></div>
    <br><br>

    Start Date :<input type="date" name="start_sprint" style="margin-left:2.6em" >
    <div class="error"><font color="red" size="2">{{ $errors->first('start_sprint') }}</p></font></div>
    {{ $project->proj_name }} Start Date: {{ date('d F Y', strtotime($project->start_date)) }}
    <br><br><br>

    End Date :<input type="date" name="end_sprint" style="margin-left:2.6em"  >
    <div class="error"><font color="red" size="2">{{ $errors->first('end_sprint') }}</p></font></div>
    {{ $project->proj_name }} End Date: {{ date('d F Y', strtotime($project->end_date)) }}
    <br><br><br>
    
        
    <button type="submit">Add Sprint</button>
        
    <br><br>

@endsection

