<!--Edit Sprint Page-->
@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br><br>
<form action="{{route('tasks.update', $task)}}" method="post">
    @csrf
    <input type="hidden" name="userstory_id" value="{{ $task->userstory_id }}"> 

    Task Name :<input type="text" name="title" style="margin-left:2.5em" value="{{$task->title}}">
    <div class="error"><font color="red" size="2">{{ $errors->first('title') }}</p></font></div>
    <br>

    Description :<input type="text" name="description" style="margin-left:2.6em" value="{{$task->description}}">
    <div class="error"><font color="red" size="2">{{ $errors->first('description') }}</p></font></div>
    <br>

    <div>
        <label for="user_name">Assigned to :</label>
        <select name="user_name" id="user_name" class="form-control">
            <option value="" selected disabled>Select</option>
            @foreach($teamlist as $teammember)
                <option value="{{ $teammember->username }}" @if($task->user_name == $teammember->username) selected @endif> {{ $teammember->username }}</option>;
            @endforeach
        </select> 
    </div>
    <br>

    <div>
        <label for="status_name">Status :</label>
        <select name="status_name" id="status_name" class="form-control">
            <option value="" selected disabled>Select</option>
            @foreach($statuses as $status)
                <option value="{{ $status->title }}" @if($task->status_name == $status->title) selected @endif> {{ $status->title }}</option>
            @endforeach
        </select> 
    </div>
    <br><br>

    Start Date :<input type="date" name="start_date" style="margin-left:2.6em" value="{{$task->start_date}}">
    <div class="error"><font color="red" size="2">{{ $errors->first('start_date') }}</p></font></div>
    {{ $sprint->sprint_name }} Start Date: {{ date('d F Y', strtotime($sprint->start_sprint)) }}
    <br><br><br>

    End Date :<input type="date" name="end_date" style="margin-left:2.6em"  value="{{$task->end_date}}">
    <div class="error"><font color="red" size="2">{{ $errors->first('end_date') }}</p></font></div>
    {{ $sprint->sprint_name }} End Date: {{ date('d F Y', strtotime($sprint->end_sprint)) }}
    <br><br><br>

    <button type="submit" >Update</button> 

</form>

@endsection

