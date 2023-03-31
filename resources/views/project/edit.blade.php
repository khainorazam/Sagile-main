@extends('layouts.app2')

@section('dashboard')

@foreach($projects as $p)
        <li>
            <a href="{{ route('projects.edit', [$p]) }}">
             {{ $p->proj_name }} 
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
<form action="{{route('projects.update', $project)}}" method="post">
        @csrf
        
Project Title :<input type="text" name="proj_name" style="margin-left:2.5em" value="{{$project->proj_name}}">
<br><br><br>
 Description :<input type="text" name="proj_desc" style="margin-left:2.6em" value="{{$project->proj_desc}}">
 <br><br><br>
 Start Date :<input type="date" name="start_date" style="margin-left:2.6em" value="{{$project->start_date}}">
 <br><br><br>
 Completion Date :<input type="date" name="end_date" style="margin-left:2.6em" value="{{$project->end_date}}">
 <br><br><br>
    
        <button type="submit" method="post">Update</button>
        
        <button type="submit", formaction="{{route('projects.destroy', $project)}}", method="delete">Delete</button>
        </form>
    
    <br><br><br>
@endsection