@extends('layouts.app2')

@section('dashboard')

@foreach($errors as $project)
        <li>
            <a href="{{ route('projects.edit', [$project]) }}">
             {{ $project->proj_name }} 
            </a>
                     
        </li>
@endforeach
        
@if($errors->isEmpty())
     No project.
@endif
@endsection

@section('content')
<br><br><br>
<form action="{{route('deffeature.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        
    {{-- User Story : <textarea id = "user_story"
        rows = "2"
        cols = "100"
        name="user_story"></textarea>
    
    <br><br><br>

    Description : <textarea id = "user_story"
    rows = "2"
    cols = "100"
    name="desc_story"></textarea>

    <br><br><br> --}}

    Title :<input type="text" name="title" style="margin-left:2.5em">

    <div class="error"><font color="red" size="2">{{ $errors->first('title') }}</p></font></div>
    <br><br>

    Description :<input type="text" name="desc" style="margin-left:2.5em">

    <div class="error"><font color="red" size="2">{{ $errors->first('desc') }}</p></font></div>
    <br><br><br>

    {{-- Priority : 
    <select name="prio_story">
        @foreach($prios as $prio)
        <option value="{{ $prio->prio_name}}" {{ ((isset($prio->prio_name) && $prio->prio_name== $prio->prio_name)? "selected":"") }}>{{$prio->prio_name}}</option>
        @endforeach
        
    </select> --}}

    <br><br><br>
    {{-- Status : 
    <select name="status_title">
        @foreach($statuses as $status)
        <option value="{{ $status->status_title}}" {{ ((isset($status->status_title) && $status->status_title== $status->status_title)? "selected":"") }}>{{$status->status_title}}</option>
        @endforeach
        
    </select> --}}
    <br><br>
    
        <button type="submit">Add Defect</button>
        <button type="submit"><a href="{{route('userstory.index')}}", method="post">Cancel</a></button>
   
    </form>
    <br><br><br>
@endsection
