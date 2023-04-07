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

@section('navbar')
    @include('inc.navbar')
@endsection

@section('content')

<br><br><br>
<form action="{{route('userstory.update', $userstory->sprint_id)}}" method="post" >
        @csrf


    Userstory ID: <input type="text" name="u_id" 
        value={{ $userstory->u_id }} readonly='readonly'/>
    <br><br><br>
  
    User Story : <textarea id = "user_story"
        rows = "2"
        cols = "100"
        name="user_story">{{old('user_story',$userstory->user_story)}}</textarea>
    
    <br><br><br>

    Description : <textarea id = "desc_story"
    rows = "2"
    cols = "100"
    name="desc_story">{{ old('desc_story',$userstory->desc_story) }}</textarea>

    <br><br><br>

    Due date : <textarea id = "user_story"
    rows = "2"
    cols = "100"
    name="due_day">{{ old('due_day',$userstory->due_day) }}</textarea>

    <br><br><br>

Priority : <textarea id ="prio_story" 
    rows = "2"
    cols = "100"
    name="prio_story">{{old('prio_story',$userstory->prio_story)}}</textarea>
    {{-- <select name="prio_story">
        @foreach($prios as $prio)
        <option value="{{ $prio->prio_name}}" {{ ((isset($prio->prio_name) && $prio->prio_name== $prio->prio_name)? "selected":"") }}>{{$prio->prio_name}}</option>
        @endforeach
        
    </select> --}}

    <br><br><br>
    Status : 
    <select name="title">
        @foreach($statuses as $status)
        <option value="{{ $status->title}}">{{$status->title}}</option>
        @endforeach
        <br><br><br>

        
    </select>
    <br><br><br>

    @csrf
    
    Security Feature : 
  
  </select>
<br><br><br>
    @foreach($secfeatures as $secfeature)
        <label class="checkbox-inline">
            <input type="checkbox" id="secfeature_id" name="secfeature_id[]" value="{{$secfeature->secfeature_name}}"> {{$secfeature->secfeature_name}}
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
        <button type="submit">Update</button>
        <button type="submit", formaction="{{route('userstory.destroy', $userstory)}}", method="post">Delete</button>   
    </form> 
    <br><br><br>

@endsection
