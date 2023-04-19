@extends('layouts.app2')

@include('inc.navbar')
@include('inc.style')

@section('content')
@include('inc.title')
<br><br><br>
    <form action="{{route('projects.update', $project)}}" method="post">
    @csrf
            
    Project Title :<input type="text" name="proj_name" style="margin-left:2.5em" readonly value="{{$project->proj_name}}">
    <br><br><br>
    Description :<input type="text" name="proj_desc" style="margin-left:2.6em"  value="{{$project->proj_desc}}">
    <br><br><br>
    Start Date :<input type="date" name="start_date" style="margin-left:2.6em" value="{{$project->start_date}}">
    <br><br><br>
    Completion Date :<input type="date" name="end_date" style="margin-left:2.6em" value="{{$project->end_date}}">
    <br><br><br>
        
    <button type="submit" method="post">Update</button>
    
    </form>
    
    <br><br><br>
@endsection