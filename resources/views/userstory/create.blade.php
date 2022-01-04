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
<form action="{{route('userstory.store')}}" method="post" enctype="multipart/form-data">
        @csrf

    Sprint ID: <input type="text" name="sprint_id" 
        value=<?php use App\Http\Controllers\UserStoryController;
        echo UserStoryController::getID(); ?>
    ></input>

    {{-- Sprint ID :<input type="text" name="sprint_id" style="margin-left:2.5em" value="{{$sprint->sprint_id}}"> --}}
     <br><br><br>   
     
    User Story : <textarea id = "user_story"
        rows = "2"
        cols = "100"
        name="user_story" ></textarea>
    
    <br><br><br>

    Description : <textarea id = "user_story"
    rows = "2"
    cols = "100"
    name="desc_story"></textarea>

    <br><br><br>

    Due date : <textarea id = "user_story"
    rows = "2"
    cols = "100"
    name="due_day"></textarea>

    <br><br><br>
    
    Priority : 
    <select name="prio_story">
        @foreach($prios as $prio)
        <option value="{{ $prio->prio_name}}" {{ ((isset($prio->prio_name) && $prio->prio_name== $prio->prio_name)? "selected":"") }}>{{$prio->prio_name}}</option>
        @endforeach
        
    </select>

    <br><br><br>

    Status : 
    <select name="title">
        @foreach($statuses as $statuses)
        <option value="{{ $statuses->title}}" {{ ((isset($statuses->title) && $statuses->title== $statuses->title)? "selected":"") }}>{{$statuses->title}}</option>
        @endforeach
        
    </select>
<br><br><br>
    
    Security Feature :  
  </select>
<br><br><br>
    @foreach($secfeatures as $secfeature)
        <label class="checkbox-inline">
            <input type="checkbox" id="SecFeature_id" name="SecFeature_id[]" value="{{$secfeature->secfeature_name}}"> {{$secfeature->secfeature_name}}
        </label>
    @endforeach

<br><br><br>


    Performance Feature : 
  </select>
<br><br><br>
    @foreach($perfeatures as $perfeature)
        <label class="checkbox-inline">
            <input type="checkbox" id="perfeature_id" name="perfeature_id[]" value="{{$perfeature->perfeature_name}}"> {{$perfeature->perfeature_name}}
        </label>
    @endforeach 

    <br><br><br>


        <button type="submit">Add Story</button>
        <button type="submit"><a href="{{route('userstory.index')}}", method="post">Cancel</a></button>
   
    </form>
    <br><br><br>
@endsection
