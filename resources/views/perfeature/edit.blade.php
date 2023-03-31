@extends('layouts.app2')

@section('dashboard')

@foreach($projects as $project)
        <li>
            <a href="{{ route('projects.edit', [$project]) }}">
             {{ $project->proj_name }} 
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
<form action="{{route('perfeature.update', $perfeature)}}" method="post" enctype="multipart/form-data">
@csrf
 
 Performance Feature Name :<input type="text" name="perfeature_name" style="margin-left:2.5em" value="{{$perfeature->perfeature_name}}">
<br><br><br>


 <button type="submit" method="post">Update</button>
 <button type="submit"><a href="{{route('perfeature.index')}}">Cancel</a></button>
 <br><br><br>
 @endsection