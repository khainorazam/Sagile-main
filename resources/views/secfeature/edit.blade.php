@extends('layouts.app2')

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
<form action="{{route('secfeature.update', $secfeature)}}" method="post">
@csrf
 
 Security Feature Name :<input type="text" name="secfeature_name" style="margin-left:2.5em" value="{{$secfeature->secfeature_name}}">
<br><br><br>
 
 Description :<input type="text" name="secfeature_desc" style="margin-left:2.6em" height="10" width="20" value="{{$secfeature->secfeature_desc}}">
 <br><br><br>

 <button type="submit">Update</button>
 <button type="submit"><a href="{{route('secfeature.index')}}">Cancel</a></button>
 <br><br><br>
 @endsection