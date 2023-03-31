<!--Home Page-->
@extends('layouts.app2')

@section('dashboard')
@foreach($errors as $project)
<li>
    <a href="{{ route('projects.edit', [$project]) }}">{{ ($project->proj_name) }} </a>
             
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

@section('article')
        <button><a href="{{route('projects.create')}}">New Project</a></button>
@endsection    
