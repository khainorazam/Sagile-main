@extends('layouts.app2')

@section('dashboard')

@foreach($projects as $p)
        <li>
            <a href="{{ route('projects.edit', [$p]) }}">
             {{ $p->proj_name }} 
            </a>
                     
        </li>
@endforeach
        
@if($projects->isEmpty())
     No project.
@endif
@endsection

@section('content')

<br><br><br>
<form action="{{route('sprint.update')}}" method="get">
    
        @csrf
 
 
    Project Name :<input type="text" name="proj_name" style="margin-left:2.5em" value="{{$sprint->proj_name}}" readonly='readonly'>
    <br><br><br>    
    Sprint Title :<input type="text" name="sprint_name" style="margin-left:2.5em" value="{{$sprint->sprint_name}}">
    <br><br><br>
    Description :<input type="text" name="sprint_desc" style="margin-left:2.6em" value="{{$sprint->sprint_desc}}">
    <br><br><br>
    Assigned To :<input type="text" name="users_name" style="margin-left:2.5em" value="{{$sprint->users_name}}" readonly='readonly'>
    <br><br><br>


    Start Date :<input type="date" name="start_sprint" style="margin-left:2.6em" value="{{$sprint->start_sprint}}">
    <br><br><br>
    Completion Date :<input type="date" name="end_sprint" style="margin-left:2.6em" value="{{$sprint->end_sprint}}">
    <br><br><br>
 <input type="hidden" name="sprint_id" value="{{$sprint->sprint_id}}"> 

         <button type="submit" >Update</button> 
        
         {{-- <button type="submit", formaction="{{route('profeature.index2', $sprint)}}", method="post">Update</button> --}}
        <button type="submit", formaction="{{route('sprints.destroy', $sprint)}}", method="post" onclick="return confirm('Are you sure to delete this sprint?')">Delete</button>
</form>
    <br><br><br>
@endsection