@extends('layouts.app2')

@section('dashboard')

@foreach($errors as $project)
<li>
    <a href="{{ route('projects.edit', [$project]) }}">
     {{ ($project->proj_name) }} 
    </a>
             
</li>
@endforeach              

@endsection
@section('article')
    
        <button><a href="{{route('projects.create')}}">New Project</a></button>
        
    
@endsection    
