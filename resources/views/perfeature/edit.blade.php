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