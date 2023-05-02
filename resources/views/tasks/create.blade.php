@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br>
  <form action="{{route('tasks.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="userstory_id" value="{{ $userstory_id }}"> 

    Task Name :<input type="text" name="title" style="margin-left:2.5em">
    <div class="error"><font color="red" size="2">{{ $errors->first('title') }}</p></font></div>
    <br>

    Description :<input type="text" name="description" style="margin-left:2.6em">
    <div class="error"><font color="red" size="2">{{ $errors->first('description') }}</p></font></div>
    <br>

    Assigned to :
    <select name="user_name">
      @foreach($teamlist as $teammember)
        <option value="{{ $teammember->username}}" {{ ((isset($teammember->username) && $teammember->username== $teammember->username)? "selected":"") }}>{{$teammember->username}}</option>
      @endforeach
    </select>
    <div class="error"><font color="red" size="2">{{ $errors->first('user_id') }}</p></font></div>
    <br>

    Status :
    <select name="status_name">
      @foreach($statuses as $status)
        <option value="{{ $status->title}}" {{ ((isset($status->title) && $status->title== $status->title)? "selected":"") }}>{{$status->title}}</option>
      @endforeach
    </select>
    <br><br><br>

    Start Date :<input type="date" name="start_date" style="margin-left:2.6em" >
    <div class="error"><font color="red" size="2">{{ $errors->first('start_date') }}</p></font></div>
    {{ $sprint->sprint_name }} Start Date: {{ date('d F Y', strtotime($sprint->start_sprint)) }}
    <br><br><br>

    End Date :<input type="date" name="end_date" style="margin-left:2.6em"  >
    <div class="error"><font color="red" size="2">{{ $errors->first('end_date') }}</p></font></div>
    {{ $sprint->sprint_name }} End Date: {{ date('d F Y', strtotime($sprint->end_sprint)) }}
    <br><br><br>
    
        
    <button type="submit">Add Task</button>
        
    <br><br>
  </form>


@endsection
