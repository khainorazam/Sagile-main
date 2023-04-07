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
    @include('inc.navbar')
@endsection

@section('content')
<br><br><br>
<form action="{{route('perfeature.store')}}" method="post" enctype="multipart/form-data">
@csrf
 Performance Feature Name :<input type="text" name="perfeature_name" style="margin-left:2.5em">
 <div class="error"><font color="red" size="2">{{ $errors->first('perfeature_name') }}</font></div>
    <br><br><br>


 <button type="submit">Save</button>
 <button type="submit"><a href="{{route('perfeature.index')}}">Cancel</a></button>
 <br><br><br>
 @endsection